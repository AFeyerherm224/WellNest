import SwiftUI

struct ContentView: View {
    @StateObject private var viewModel = BloodWorkViewModel()
    @State private var showingAddSheet = false
    
    var body: some View {
        NavigationView {
            List(viewModel.bloodWorkResults) { result in
                VStack(alignment: .leading) {
                    Text(result.testType)
                        .font(.headline)
                    Text("Value: \(result.value, specifier: "%.2f") \(result.unit)")
                    Text("Date: \(result.date, style: .date)")
                    Text(result.isWithinRange ? "Within range" : "Out of range")
                        .foregroundColor(result.isWithinRange ? .green : .red)
                }
            }
            .navigationTitle("Blood Work Results")
            .toolbar {
                Button(action: { showingAddSheet = true }) {
                    Image(systemName: "plus")
                }
            }
        }
        .sheet(isPresented: $showingAddSheet) {
            AddBloodWorkView(viewModel: viewModel)
        }
        .onAppear {
            viewModel.fetchAllResults()
        }
    }
}

struct AddBloodWorkView: View {
    @ObservedObject var viewModel: BloodWorkViewModel
    @Environment(\.presentationMode) var presentationMode
    
    @State private var date = Date()
    @State private var testType = ""
    @State private var value = ""
    @State private var unit = ""
    @State private var lowerRange = ""
    @State private var upperRange = ""
    
    var body: some View {
        NavigationView {
            Form {
                DatePicker("Date", selection: $date, displayedComponents: .date)
                TextField("Test Type", text: $testType)
                TextField("Value", text: $value)
                    .keyboardType(.decimalPad)
                TextField("Unit", text: $unit)
                TextField("Lower Range", text: $lowerRange)
                    .keyboardType(.decimalPad)
                TextField("Upper Range", text: $upperRange)
                    .keyboardType(.decimalPad)
            }
            .navigationTitle("Add Blood Work Result")
            .toolbar {
                Button("Save") {
                    if let value = Double(value),
                       let lowerRange = Double(lowerRange),
                       let upperRange = Double(upperRange) {
                        viewModel.addNewResult(date: date,
                                               testType: testType,
                                               value: value,
                                               unit: unit,
                                               referenceRange: lowerRange...upperRange)
                        presentationMode.wrappedValue.dismiss()
                    }
                }
            }
        }
    }
}
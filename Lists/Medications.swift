import SwiftUI
struct ContentView: View {
    
    @State private var medications: [String] = []
    @State private var newMedication: String = ""

    var body: some View {
        VStack {
            TextField("Enter medication name", text: $newMedication)
            .textFieldStyle(RoundedBorderTextFieldStyle())
            .padding()

            Button(action: {
                if !newMedication.isEmpty {
                    medications.append(newMedication)
                    newMedication = "" //Clear input field 
                }
            }) {
                Text("Add Medication")
                .padding()
                .background(Color.blue)
                .foregroundColor(.white)
                .cornerRadius(8)
            }

            Spacer()
        }
        .padding()
    }
}

struct ContentView_Previews:
PreviewProvider {
    static var previews: some View {
        ContentView()
    }
}
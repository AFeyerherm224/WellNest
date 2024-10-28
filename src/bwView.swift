import Foundation

class BloodWorkViewModel: ObservableObject {
    @Published var bloodWorkResults: [BloodWorkResult] = []
    
    private let dataManager = HealthDataManager.shared
    
    func fetchAllResults() {
        bloodWorkResults = dataManager.getAllBloodWorkResults()
    }
    
    func addNewResult(date: Date, testType: String, value: Double, unit: String, referenceRange: ClosedRange<Double>) {
        let newResult = BloodWorkResult(date: date, testType: testType, value: value, unit: unit, referenceRange: referenceRange)
        dataManager.addBloodWorkResult(newResult)
        fetchAllResults()
    }
    
    func getAnalysis(for testType: String) -> String {
        return dataManager.analyzeResults(for: testType)
    }
}
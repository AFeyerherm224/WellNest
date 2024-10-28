import Foundation

class HealthDataManager {
    static let shared = HealthDataManager()
    
    private init() {}
    
    private var bloodWorkResults: [BloodWorkResult] = []
    
    func addBloodWorkResult(_ result: BloodWorkResult) {
        bloodWorkResults.append(result)
    }
    
    func getAllBloodWorkResults() -> [BloodWorkResult] {
        return bloodWorkResults
    }
    
    func getBloodWorkResults(for testType: String) -> [BloodWorkResult] {
        return bloodWorkResults.filter { $0.testType == testType }
    }
    
    func analyzeResults(for testType: String) -> String {
        let results = getBloodWorkResults(for: testType)
        let outOfRangeCount = results.filter { !$0.isWithinRange }.count
        let totalCount = results.count
        
        if totalCount == 0 {
            return "No data available for \(testType)"
        }
        
        let percentageOutOfRange = Double(outOfRangeCount) / Double(totalCount) * 100
        return String(format: "%.1f%% of %@ results are out of the reference range.", percentageOutOfRange, testType)
    }
}
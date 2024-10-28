import Foundation

struct BloodWorkResult: Identifiable, Codable {
    let id: UUID
    let date: Date
    let testType: String
    let value: Double
    let unit: String
    let referenceRange: ClosedRange<Double>
    
    var isWithinRange: Bool {
        referenceRange.contains(value)
    }
    
    init(id: UUID = UUID(), date: Date, testType: String, value: Double, unit: String, referenceRange: ClosedRange<Double>) {
        self.id = id
        self.date = date
        self.testType = testType
        self.value = value
        self.unit = unit
        self.referenceRange = referenceRange
    }
}
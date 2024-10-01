import SwiftUI

struct ContentView: View {
    @State private var username: String = ""
    @State private var password: String = ""

    var body: some View {
        Form {
            Section(header: Text("Login Information")) {
                TextField("Username", text: $username)
                SecureField("Password", text: $password)
            }

            Button(action: {
                print("Logging in with username: \(username) and password: \(password)")
            }) {
                Text("Login")
                    .foregroundColor(.blue)
            }
        }
    }
}


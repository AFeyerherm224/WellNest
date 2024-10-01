Basic SwiftUI Structure : 

import SwiftUI

struct ContentView: View {
    var body: some View {
        VStack {  // VStack arranges elements vertically
            Text("Hello, SwiftUI!")
                .font(.largeTitle)
                .padding()

            Button(action: {
                print("Button was tapped!")
            }) {
                Text("Tap me")
                    .font(.title)
                    .padding()
                    .background(Color.blue)
                    .foregroundColor(.white)
                    .cornerRadius(10)
            }
        }
    }
}

struct ContentView_Previews: PreviewProvider {
    static var previews: some View {
        ContentView()
    }
}

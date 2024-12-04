# WellNest

Final Project for CS302
Aidan Feyerherm, Jeffrey Chen, Joey DiSalvo, Cristian Frutos

Prerequisites
- Install Flutter SDK: Download and install the Flutter SDK from the official website.
- Install Android Studio: Ensure you have Android Studio installed with the following components:
Android SDK,
 Android Emulator,
 Command-line Tools
- Set Up PATH Variables:
- Add the Flutter SDK (flutter/bin) and Android SDK (platform-tools) to your system PATH.
- Install IDE Plugins
- Install the Flutter and Dart plugins in Android Studio or Visual Studio Code.
Steps to Set Up and Run the App
1. Open the Project
Navigate to File > Open Folder in your IDE and select the folder containing your Flutter project.
2. Set Up an Android Emulator
Open Android Studio.
Go to Tools > Device Manager or click on the "Device Manager" icon.
Click Create Device.
Select a hardware profile (e.g., Pixel 4) and click Next.
Choose a system image (e.g., Android API level 30). Download it if necessary.
Verify configurations and click Finish.
Start the emulator by clicking the "Play" button next to your virtual device.
3. Run Your Flutter App
Open your project in your IDE.
Ensure the emulator is running.
In the terminal, navigate to your project directory and run:
bash
flutter run

Alternatively, use your IDE's built-in options:
In Android Studio: Go to Run > Run or press Shift + F10.
In VS Code: Right-click on main.dart and select Run Without Debugging.

Slow Build Time:
The first build may take longer as dependencies are compiled. Subsequent builds will be faster using hot reload (Ctrl + S).

## CES Dashboard Monitoring System (V2)

((This project is still under development!!))

This is the 2nd version of the CES Dashboard Monitoring System. It builds on the previous version, and my contribution is adding a new IoT monitoring module for mushroom cultivation using ESP32 and Laravel.

Previous version:
https://github.com/Pranandito/ces-dashboard

### Hardware

- ESP32 Dev Module
- SHT40 
- LCD 20x4 (I2C)
- Potentiometer
- Solar Panel (On Progress)
- MPPT 

### System
The dashboard gets environmental data from ESP32 devices through REST APIs, stores everything in a MySQL database, and displays it on a web dashboard for both real-time monitoring and historical data.
Right now, I'm mainly working on the mushroom cultivation module, which includes:

- Temperature monitoring
- Humidity monitoring
- Historical data logging
- Device authentication using API Key

### Future Plans

Still a lot to work on 😅

- Adding a solar-powered IoT system
- Improving the dashboard UI
- Notifications & alerts

More updates coming soon in "CES Dashboard Monitoring System V3"!

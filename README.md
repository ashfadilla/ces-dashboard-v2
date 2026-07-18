<p align="center">
  <h1 align="center">CES Dashboard Monitoring System (V2)</h1>
  <p align="center">
    Web-based IoT Monitoring Platform built with Laravel & ESP32
  </p>
</p>

<p align="center">

![Status](https://img.shields.io/badge/status-Under%20Development-orange)
![Laravel](https://img.shields.io/badge/Laravel-12-red)
![PHP](https://img.shields.io/badge/PHP-8.2-blue)
![ESP32](https://img.shields.io/badge/ESP32-IoT-green)
![License](https://img.shields.io/badge/License-MIT-lightgrey)

</p>

---

# ⚠️ Project Status

This project is currently under active development.

CES Dashboard Monitoring System (V2) is the continuation of the previous CES monitoring platform. While the first version mainly focused on environmental and laboratory monitoring, this version expands the system by introducing a dedicated **Mushroom Cultivation Monitoring** module together with a cleaner backend architecture and improved communication between ESP32 devices and the Laravel server.

**Previous Version (V1)**

> https://github.com/YOUR_USERNAME/YOUR_REPOSITORY

---

# About

CES Dashboard Monitoring System is a web-based IoT platform designed to collect, store, and visualize sensor data from ESP32 devices.

The system provides a centralized dashboard for monitoring environmental parameters and can be extended to support multiple monitoring applications in the future.

Current development focuses on integrating mushroom cultivation monitoring using ESP32, SHT40 sensors, and Laravel REST APIs.

---

# What's New in V2

Compared to the previous version, V2 introduces:

- 🍄 Mushroom Cultivation Monitoring module
- 📡 HTTP REST API communication for ESP32
- 🔐 API Key authentication
- 💾 MySQL sensor data storage
- 📊 Dedicated monitoring dashboard
- ⚙️ Laravel 12 backend improvements
- 🧩 Modular structure for future expansion

---

# Current Features

### Mushroom Monitoring

- Temperature monitoring
- Humidity monitoring
- Relay status monitoring
- Automatic / Manual operating mode
- Historical sensor data logging

### Backend

- Laravel 12
- REST API
- Request validation
- API Key authentication
- MySQL database integration

### ESP32

- SHT40 temperature & humidity sensor
- LCD 20x4 display
- HTTP POST communication
- Periodic data transmission

---

# Tech Stack

### Backend

- Laravel 12
- PHP
- MySQL

### IoT

- ESP32
- SHT40 Sensor
- HTTP REST API
- Arduino IDE

### Frontend

- Blade
- Bootstrap
- JavaScript

---

# Project Structure

```
ESP32
   │
   │ HTTP POST
   ▼
Laravel REST API
   │
   ▼
Request Validation
   │
   ▼
Controller
   │
   ▼
MySQL Database
   │
   ▼
Dashboard
```

---

# Development Roadmap

The following features are planned for future releases:

- Live dashboard updates
- Data visualization and charts
- Multi-node monitoring
- Device management
- Notification system
- Historical data analytics
- Dashboard improvements

---

# Installation

Clone this repository

```bash
git clone https://github.com/YOUR_USERNAME/ces-dashboard-main.git
```

Install dependencies

```bash
composer install
```

Copy environment configuration

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Run database migration

```bash
php artisan migrate
```

Start the development server

```bash
php artisan serve
```

---

# License

This project is developed for educational and IoT monitoring purposes.

Licensed under the MIT License.

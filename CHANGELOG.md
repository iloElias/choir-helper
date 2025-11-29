# 📑 Changelog

All notable changes to this project will be documented in this file.

This format follows a lightweight and clear structure suitable for personal libraries.

---

## [vX.Y.Z] - YYYY-MM-DD

### 🚀 New Features

- ...

### 🐛 Fixes

- ...

### 🔧 Internal / Refactor

- ...

### 📝 Notes

- ...

---

## [v0.1.2] - 2025-11-29

### 🚀 New Features

- N/A

### 🐛 Fixes

- N/A

### 🔧 Internal / Refactor

- Removed autoload requirement from `index.php` to streamline initialization
- Updated `Helper::boot()` to use `self::rootDir()` instead of `App::rootDir()` for consistency

### 📝 Notes

- Version bumped from 0.1.1 to 0.1.2

---

## [v0.1.1] - 2025-11-29

### 🚀 New Features

- Added `App` class for application configuration and root directory management
- Added `App::configure()` method to set the application root directory
- Added `App::rootDir()` method to retrieve the configured root directory

### 🐛 Fixes

- N/A

### 🔧 Internal / Refactor

- Removed `Interceptor` class dependency from `Config`, `Env`, `Helper`, and `View` classes
- Moved `boot()` method from `Interceptor` to `Helper` class directly
- Simplified class hierarchy by removing inheritance from `Interceptor`
- Deleted unused `Interceptors/Interceptor.php` file

### 📝 Notes

- Version bumped from 0.1.0 to 0.1.1

---

## [v0.1.0] - 2025-01-01

### 🚀 New Features

- Initial release of the library.
- Base structure created.

### 🐛 Fixes

- N/A

### 🔧 Internal / Refactor

- N/A

### 📝 Notes

- Start of version tracking.

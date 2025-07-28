# 🚗 Car Database

## 🇵🇱 Opis

Prosta aplikacja internetowa do zarządzania bazą danych samochodów. Projekt stworzony w celach edukacyjnych – do nauki operacji CRUD oraz integracji frontendu z backendem.

### 🔧 Funkcje

- Dodawanie nowych samochodów (marka, model, rok, VIN itp.)
- Wyświetlanie listy samochodów
- Edycja i usuwanie rekordów
- Walidacja formularzy

### 🛠 Technologie

- **PHP**
- **MySQL**
- **HTML5 / CSS3**
- **JavaScript**

### ▶️ Jak uruchomić lokalnie

1. Sklonuj repozytorium:
   ```bash
   git clone https://github.com/NorbertTrytek/Car-Database.git
   ```
2. Zaimportuj plik `car_database.sql` z folderu `database/` do swojej lokalnej bazy danych MySQL
3. Skonfiguruj dane dostępowe do bazy w pliku `db.php`
4. Uruchom aplikację przez lokalny serwer (XAMPP)
5. Wejdź na `http://localhost/Car-Database`

### 📁 Struktura projektu

```
Car-Database/
├── database/           # Plik SQL
├── css/                # Style CSS
├── js/                 # Skrypty JavaScript
├── index.php           # Strona główna (lista pojazdów)
├── add.php             # Formularz dodawania
├── edit.php            # Formularz edycji
├── db.php              # Połączenie z bazą danych
└── README.md
```

### 📝 Uwagi

- Projekt edukacyjny — nie zawiera systemu logowania.
- Można go rozbudować np. o wyszukiwanie, filtrowanie, logowanie użytkownika itd.

---

## EN Description

A simple web application for managing a car database. Created as a learning project to practice CRUD operations and backend integration.

### 🔧 Features

- Add new cars (brand, model, year, VIN, etc.)
- List all cars
- Edit and delete records
- Basic form validation

### 🛠 Technologies

- **PHP**
- **MySQL**
- **HTML5 / CSS3**
- **JavaScript**

### ▶️ How to run locally

1. Clone the repository:
   ```bash
   git clone https://github.com/NorbertTrytek/Car-Database.git
   ```
2. Import the `car_database.sql` file from the `database/` folder into your local MySQL
3. Set up your database credentials in `db.php`
4. Run the app using a local server (e.g., XAMPP, MAMP, WAMP)
5. Go to `http://localhost/Car-Database`

### 📁 Project Structure

```
Car-Database/
├── database/           # SQL dump
├── css/                # Styling
├── js/                 # JavaScript files
├── index.php           # Main page
├── add.php             # Add car form
├── edit.php            # Edit car form
├── db.php              # Database connection
└── README.md
```

### 📝 Notes

- This is an educational/demo project.
- No login/authentication is implemented.
- Feel free to expand it with filtering, user login, or advanced features.

---

> 💡 Możesz użyć tego pliku jako `README.md` w swoim repozytorium.

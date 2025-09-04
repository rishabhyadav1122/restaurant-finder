# Restaurant Finder App

A simple web application built with **Laravel** that allows users to find a list of restaurants in a given city using the **Google Maps Places API**.

---

## 🚀 Features

* **City-based Search:** Find restaurants by entering the name of a city.
* **API Integration:** Fetches real-time data from the Google Maps Places API.
* **Restaurant Details:** Displays the name, address, and rating for each restaurant.
* **Clean UI:** A modern, dark-themed user interface with a smooth transition and loading spinner for a better user experience.

---

## 🛠️ Technologies Used

* **Laravel:** The PHP framework for the back-end logic.
* **PHP:** The core programming language.
* **Google Maps Places API:** The API used to fetch restaurant data.
* **Composer:** The dependency manager for PHP.
* **HTML5, CSS3, & Vanilla JS:** Used for the front-end design and interactive elements.

---

## 🔧 Installation and Setup

Follow these steps to get a local copy of the project up and running.

### Prerequisites

* **PHP:** [A recent version of PHP](https://www.php.net/downloads.php) (8.1 or higher).
* **Composer:** [Installed on your machine](https://getcomposer.org/download/).
* **Google Maps API Key:** You'll need to [register for a key](https://developers.google.com/maps/documentation/places/web-service/get-api-key) and enable the **Places API**.

### Steps

1.  **Clone the repository:**
    ```bash
    git clone [git@github.com:rishabhyadav1122/restaurant-finder.git](git@github.com:rishabhyadav1122/restaurant-finder.git)
    cd restaurant-finder
    ```

2.  **Install dependencies:**
    ```bash
    composer install
    ```

3.  **Configure the environment:**
    * Create a copy of the `.env.example` file and rename it to `.env`:
        ```bash
        cp .env.example .env
        ```
    * Generate a new application key:
        ```bash
        php artisan key:generate
        ```
    * Open your new `.env` file and add your Google Maps API key:
        ```env
        GOOGLE_MAPS_API_KEY=YOUR_API_KEY_HERE
        ```

4.  **Run the local development server:**
    ```bash
    php artisan serve
    ```

Your application should now be accessible at `http://127.0.0.1:8000`.

---

## 🌐 Live Demo

The application is deployed and live on Render. You can check it out here:

👉 **[https://restaurant-finder-yiq0.onrender.com/](https://restaurant-finder-yiq0.onrender.com/)** 

---

## 📄 License

This project is open-source and licensed under the **MIT License**.
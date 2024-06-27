<a name="readme-top"></a>

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/KvJellyBean/laundry-app">
    <img src="./public/assets/images/banner.jpeg" alt="Logo Banner">
  </a>

<h3 align="center">Sarifna Laundry</h3>

  <p align="center">
    A web-based application designed to streamline laundry operations by offering user-friendly features for order management, transaction processing, and financial reporting, ensuring enhanced efficiency and customer satisfaction.
    <br />
    <a href="https://github.com/KvJellyBean/laundry-app/issues">Report Bug</a>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ul>
    <li>
      <a href="#about-the-project">About The Project</a>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#contributing">Contributing</a></li>
  </ul>
</details>

<!-- ABOUT THE PROJECT -->

## About The Project

[![Sarifna Laundry][product-img]](https://github.com/KvJellyBean/laundry-app)

Sarifna Laundry Website is an advanced web-based application designed to enhance the operational efficiency of Sarifna Laundry. This application aims to streamline various aspects of the laundry service, including user registration, order management, transaction processing, financial reporting, and service package management. By leveraging modern web technologies, Sarifna Laundry Website provides an intuitive and user-friendly interface for both customers and staff, ensuring a seamless and efficient experience.

Developed by:

-   **Ari Wijaya (535220060)**
-   **Richard Vincentius (535220077)**
-   **Kevin Natanael (535220084)**

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->

## Getting Started

Quickly set up a local copy by following these simple steps for a seamless start.

### Prerequisites

-   Web browser (Google Chrome recommended)
-   PHP Laravel v.10 & Its environment (Composer, XAMPP, etc)
-   PostgreSQL (PGAdmin 4)
-   Node package manager (npm)
    ```sh
    npm install npm@latest -g
    ```
-   Uncomment the `ext=intl` in the `php.ini`

### Installation

-   Clone the repository to your local machine
    ```sh
    git clone https://github.com/KvJellyBean/laundry-app.git
    ```
-   Navigate to your local project
    ```sh
    cd laundry-app
    ```
-   Install dependencies
    ```sh
    composer install
    npm install
    ```
-   Change the name of `.env.copy` file into `.env` in your local project
    (Make sure inside your `.env` file has the right configuration for your machine)
-   Run migration and the seeder
    ```sh
    php artisan migrate
    php artisan db:seed
    ```
    Or just simply import laundry.sql into your local database

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- USAGE EXAMPLES -->

## Usage

-   Start the project
    ```sh
    php artisan serve
    ```
-   If the project is not yet open, open it using `http://127.0.0.1:8000/` in your web browser

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- CONTRIBUTING -->

## Contributing

If you have suggestions to enhance this project, feel free to fork the repo and submit a pull request. Alternatively, you can open an issue with the "enhancement" tag. Your contributions are highly valued and will help make this project even better. Thank you for your support! 🚀

Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->

[product-img]: ./public/assets/images/sarifnaLaundry.jpg

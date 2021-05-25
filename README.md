<!-- PROJECT LOGO -->
<br />
<p align="center">
  <h1 align="center">Parking Lot System 🚘</h1>

  <p align="center">
    A parking lot database management system for both employees and customers. Built as a group project for UBC CPSC 304 (Relational Databases).
    <br />
    <br />
    <a href="https://sassanshokoohi.ca">About Me</a>
    ·
    <a href="https://github.com/sassansh/Parking-Lot-System/issues">Report Bug</a>
    ·
    <a href="https://github.com/sassansh/Parking-Lot-System/issues">Request Feature</a>
  </p>
</p>

![GitHub contributors](https://img.shields.io/github/contributors/sassansh/Parking-Lot-System?color=ffcc66&style=for-the-badge)
![GitHub stars](https://img.shields.io/github/stars/sassansh/Parking-Lot-System?color=ffcc66&style=for-the-badge)
[![GitHub forks](https://img.shields.io/github/forks/sassansh/Parking-Lot-System?style=for-the-badge)](https://github.com/sassansh/Parking-Lot-System/network)
[![GitHub issues](https://img.shields.io/github/issues/sassansh/Parking-Lot-System?color=ffcc66&style=for-the-badge)](https://github.com/sassansh/Parking-Lot-System/issues)
[![GitHub license](https://img.shields.io/github/license/sassansh/Parking-Lot-System?style=for-the-badge)](https://github.com/sassansh/Parking-Lot-System/blob/master/LICENSE)
[![LinkedIn][linkedin-shield]][linkedin-url]

![Site preview](/images/homepage.png)

## Table of Contents

- [Technology Stack 🛠️](#technology-stack-)
- [Database Diagram 🗒](#database-diagram-)
- [Prerequisites 🍪](#prerequisites-)
- [Setup And Deployment 🔧](#setup-and-deployment-)
- [The Team 👨🏻‍💻](#the-team-)
- [Contact 📧](#contact-)

## Database Diagram 🗒

For the course, we designed, normalized and sketched a database diagram:

![DB Diagram](/images/db-diagram.png)
## Technology Stack 🛠️

Dependencies used in this project:

[XAMPP](https://www.apachefriends.org/index.html)
| [MySQL](https://www.mysql.com/)
| [PHP](https://www.php.net/)
| [Bootstrap](https://getbootstrap.com/)

## Prerequisites 🍪

You should have [XAMPP v7.3.28](https://www.apachefriends.org/download.html) and [Git](https://git-scm.com/) installed on your PC.

## Setup And Deployment 🔧

1. Clone the repo using:

   ```bash
     git clone https://github.com/sassansh/Parking-Lot-System.git
   ```

2. Start up XAMPP by pressing `Start` under `General`:

![XAMPP General](/images/xampp-general.png)

3. Verify that `Apache` and `MySQL` are running under `Services`.

![XAMPP Services](/images/xampp-services.png)

4. Enable port forwarding by clicking `Enable` under `Network`.

![XAMPP Network](/images/xampp-network.png)

5. Mount and open the XAMPP data volume by pressing `Mount` then `Explore` under `Volumes`:

![XAMPP Volumes](/images/xampp-volumes.png)

6. Copy all files in `/htdocs/` of this repo to your XAMPP data volume under `/htdocs/`.

![XAMPP Dir](/images/xampp-dir.png)

8. For database setup, browse to 

   ```https
     http://localhost:8080/phpmyadmin
   ```

9. To setup a new empty database named `parking_lot` follow these 2 steps:

![PHPMyAdmin New](/images/phpmyadmin-new.png)

![PHPMyAdmin DB Name](/images/phpmyadmin-dbnew.png)

10. To populate the new db with the structure and data, copy the contents of `/sql/create_and_insert.sql` and run it using phpmyadmin:

![PHPMyAdmin SQL](/images/phpmyadmin-sql.png)

11. Congrats you are now ready to browse the website. Visit:

   ```https
     http://localhost:8080/
   ```

![Insert New Space](/images/insert-new-space.png)

![Customers](/images/customers.png)

![Officers](/images/officers.png)

![Count Officers](/images/count-officers.png)

![Lot Rates](/images/lot-rates.png)

## The Team 👨🏻‍💻

Sassan Shokoohi - [GitHub](https://github.com/sassansh) - [LinkedIn](https://www.linkedin.com/in/sassanshokoohi/)

Tony Wu - [GitHub](https://github.com/itstonywu) - [LinkedIn](https://www.linkedin.com/in/tonywu94/)

Jun Kim - [GitHub](https://github.com/Junkim97)


## Contact 📧

Sassan Shokoohi - sassansh@student.ubc.ca

Project Link: [https://github.com/sassansh/Parking-Lot-System](https://github.com/sassansh/Parking-Lot-System)

[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/sassanshokoohi/

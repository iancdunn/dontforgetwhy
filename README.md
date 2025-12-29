# DontForgetWhy (DFY) - Intentional Finance Tracker

A LAMP-stack personal finance application designed to enforce intentional capital allocation. Unlike standard expense trackers, this tool uses a **Zero-Based Budgeting** algorithm to automatically split every deposit into four strategic buckets: *Needs*, *Wants*, *Savings* (Liquidity), and *Investments* (Growth).

The project emphasizes backend logic integrity, handling floating-point arithmetic precision and strict session-based security for financial data.

## Key Features

* **Automated Allocation:** Deposits are programmatically split into four categories based on user-defined percentages.
* **Granular Asset Tracking:** Distinct separation between "Savings" (Safe/Liquid) and "Investments" (Volatile/Growth) to encourage the "Golden Era of Compounding" mindset.
* **Transactional Integrity:** Logic gates prevent withdrawals if a specific bucket (e.g., "Wants") lacks sufficient funds, even if the Total Balance is positive.
* **Math Precision:** Implements a custom algorithm in `transaction_backend.php` to correct floating-point rounding errors that occur when splitting currency across multiple percentages.
* **Secure Authentication:** Utilizes PHP sessions and `password_hash()`/`password_verify()` for secure user access.

## Tech Stack

* **Backend:** PHP 8.x
* **Database:** MySQL (Relational Schema)
* **Frontend:** HTML5, CSS3
* **Environment:** XAMPP / LAMP Stack

## Project Structure

```text
dontforgetwhy/
├── db.php                     # Database connection configuration
├── transaction_backend.php    # Core ETL logic for deposits/withdrawals
├── allocation_backend.php     # Logic for updating budget percentages
├── login_backend.php          # Authentication handling
├── home.php                   # User Dashboard
├── transaction.php            # Transaction Input Form
└── style.css                  # Custom styling

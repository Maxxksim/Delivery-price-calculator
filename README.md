# Delivery Price Calculator

Delivery Price Calculator is a web application for calculating shipping costs.  
The project consists of:  
- Vue frontend  
- Symfony API  
- Nginx as a reverse proxy  
- Docker environment for running the entire project  

The application allows users to retrieve available carriers and calculate delivery prices via API.

---

## Table of Contents
- [Setup & Installation](#setup--installation)
- [Functionality](#functionality)
- [Examples of Usage](#examples-of-usage)

---

## Setup & Installation

To run the Delivery Price Calculator locally, follow these steps:

### Prerequisites
- Docker
- Git

### Installation Steps
1. Clone the repository:    
```
git clone https://github.com/Maxxksim/Delivery-price-calculator.git
```
2. Navigate to the project directory:
```
cd delivery-price-calculator
```
3. Copy env:
```
copy .\api\.env.example .\api\.env
```
4. Run the project using Docker:
```
docker-compose up --build
```
5.Access the application in your web browser at http://localhost:80

### Functionality

The project provides the following features:

-  **Shipping Cost Calculation**  
  Calculate delivery prices via API quickly and accurately.

- **Multiple Carriers Support**  
  Choose from various carriers to compare prices and delivery options.

### Examples of Usage

1.Calculate price using the first carrier
<img width="1280" height="679" alt="image" src="https://github.com/user-attachments/assets/4e5bbcf3-daf1-4115-bc5f-a873a54ce233" />

2. Calculate price using the first carrier for weight more then 10 kg 
<img width="1280" height="679" alt="image" src="https://github.com/user-attachments/assets/f98d1176-060f-4cf2-8520-cbd1ac83bd18" />

3. Calculate price using the second carrier 
<img width="1280" height="681" alt="image" src="https://github.com/user-attachments/assets/a6a4e72a-6871-4ed5-b2b7-af165bc7c34b" />


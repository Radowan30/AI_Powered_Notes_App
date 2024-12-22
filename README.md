# Getting Started with the AI-Powered Notes App  

Follow these steps to set up and run the Laravel 11 project locally on your computer.  

---

## Prerequisites  
Before you begin, ensure you have the following installed:  
- [VS Code](https://code.visualstudio.com/) or any code editor of your choice  
- [Composer](https://getcomposer.org/) for managing PHP dependencies  
- [Node.js and npm](https://nodejs.org/) for running frontend tools  
- A database management software like [XAMPP](https://www.apachefriends.org/) or similar  

---

## Steps to Set Up the Project  

1. **Clone the Repository**  
   Open your terminal in the desired folder and run:  
   ```bash
   git clone https://github.com/Radowan30/AI_Powered_Notes_App.git
   ```  

2. **Install Dependencies**  
   Navigate to the project directory and run:  
   ```bash
   cd AI_Powered_Notes_App  
   composer install
   ```  
   This will install all required PHP dependencies and generate the `.env` file.  

3. **Set Up Your Groq API Key**  
   - Go to [Groq Console](https://console.groq.com/keys) and create a free API key.  
   - Save the key securely, as it won't be visible again.  
   - Open the `.env` file in the project and add the key as follows:  
     ```env
     GROQ_API_KEY=your_api_key_here
     ```  

4. **Select an AI Model**  
   - Visit [Groq AI Models](https://console.groq.com/docs/models) to explore available models.  
   - Copy the model ID of your preferred model.  
   - Add it to the `.env` file:  
     ```env
     GROQ_MODEL='your_model_id_here'
     ```  
   - *Note:* If no model is specified, the application will default to using the `llama3-8b-8192` model.  

5. **Set Up the Database**  
   - Start the **Apache** and **MySQL** servers using your database management software (e.g., XAMPP).  
   - Update the database configuration in the `.env` file with these database credentials:  
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=laravel_project_db
     DB_USERNAME=root
     DB_PASSWORD=
     ```  

6. **Run Database Migrations**  
   Run the following command to set up the database tables:  
   ```bash
   php artisan migrate
   ```  
   Confirm with `yes` if prompted to create the database.  

7. **Build Frontend Assets**  
   Run the following command to compile frontend assets:  
   ```bash
   npm install  
   npm run dev
   ```  

8. **Start the Development Server**  
   Serve the application by running:  
   ```bash
   php artisan serve
   ```  

---

## Access the Application  
Once the server is running, open your browser and navigate to:  
[http://127.0.0.1:8000](http://127.0.0.1:8000)  

Congratulations! You should now be able to use the AI-Powered Notes App. 🎉  
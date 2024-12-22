# AI-Powered Notes App  

## About the Project  
This project started as a basic Laravel 11 note-taking application, built by following a YouTube tutorial. But I decided to take it to the next level by adding my own twist! 💡  

The result? An **AI-powered upgrade** that enhances the user experience. The AI analyzes your notes and generates a concise, accurate title for each one, which is displayed right on the dashboard. No more typing out titles manually—it's all automated, saving you time and effort!  

---

## Features  
- **AI-Generated Titles**: Automatically generates titles for your notes, reducing manual effort.  
- **User-Friendly Dashboard**: Clean and intuitive interface for managing your notes.  
- **Default AI Model**: Uses `llama3-8b-8192` by default but supports customizable model selection.  

---

## Built With  
- **HTML**  
- **Tailwind CSS**  
- **JavaScript**  
- **Laravel 11**  
- **Groq API**  

---

## Getting Started  
To get started with this project, follow the setup instructions below:  
1. Clone the repository.  
2. Install dependencies using Composer.  
3. Configure your `.env` file with your Groq API key and model of choice.  
4. Set up your database and run migrations.  
5. Serve the application locally.  

For detailed setup steps, see the [Setup Instructions](#setup-instructions) section below.  

---

## Resources Used  
This project was inspired and implemented using the following resources:  
- [Laravel 11 Tutorial for the Notes App](https://youtu.be/eUNWzJUvkCA?si=VV63SVVvA5BB4_MI)  
- [Implementing Groq with Laravel](https://youtu.be/wxGEqe9-4Mo?si=EueqIoznq40RTLsm)  

---

## Future Plans  
It was fun implementing this idea, and I’m excited to work on more AI-driven projects in the future.🚀  

---

## Setup Instructions  

### Prerequisites  
Before you begin, ensure you have the following installed:  
- [VS Code](https://code.visualstudio.com/) or any code editor of your choice  
- [Composer](https://getcomposer.org/) for managing PHP dependencies  
- [Node.js and npm](https://nodejs.org/) for running frontend tools  
- A database management software like [XAMPP](https://www.apachefriends.org/) or similar  

### Steps to Set Up the Project  

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
     GROQ_MODEL=your_model_id_here
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

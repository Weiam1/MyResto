
# **MyResto - Laravel Project**


### **README.md**

# **Recipe Management Website**

This Laravel-based project is a dynamic recipe management website. It allows users to explore, manage, and interact with recipes, news, FAQs, and more. Here's a detailed overview of the website's features and functionalities:

---

## **Features**

### 1. **Authentication System**
- **User Login & Registration:**
  - Users can register and log in to the website.

- **Admin Management:**
  - Admins can  create new users and promote or demote them to/from admin roles .

### 2. **Profile Management**
- **Public Profile Page:**
  - Each user has a public profile page viewable by others.
  - Includes user information: username, birthday, profile picture, "about me" section and the saved recipes.
- **Edit Profile:**
  - Users can update their information, upload a profile picture, and edit their bio.
- **Search for Users:**
  - Search functionality allows users to find others by 
    unique username.

### 3. **Recipes**
- **Recipe Listings:**
  - A page displaying all recipes with titles, images, and descriptions.
  - Recipes can be filtered by categories (e.g., Main Dish, Healthy, Dessert).
- **Add/Edit Recipes:**
  - Admins can add and edit recipes.
  - Includes fields for title, description, ingredients, steps, category, and image.
- **Save/Unsave Recipes:**
  - Users can save recipes to their profiles and view them later.
- **Rate Recipes:**
  - Users can rate recipes on a scale of 1–5.
  - **Recipe Comments:**
  - Users can comment on recipes and  open the profle of the user who commented by clicking on  thyre username
- **Recipe Details:**
  - A detailed page shows the recipe’s content, ingredients, and steps.

  7. **Recipe Comments**
-**Adding Comments:**
Registered users can add comments to recipes. Each comment includes the user's name and content.
The comment form is displayed on each recipe's details page for authenticated users.
-**View Comments:**
Each recipe's detail page displays a list of all comments left by users.
Comments show the username of the person who posted them.
-**Profile Linking:**
The username of the commenter is clickable, linking directly to their public profile page.

### 4. **News Management**
- **News Listings:**
  - A page displaying all news articles with images, titles, and summaries.
- **News Details:**
  - Each news article has its own detailed page.
- **Admin Management:**
  - Admins can create, edit, and delete news articles.

### 5. **FAQs**
- **FAQ Page:**
  - Displays a list of questions and answers grouped by category.
- **Admin Management:**
  - Admins can add, edit, and delete FAQ categories and items.

### 6. **Contact Us**
- **Contact Form:**
  - Users can send messages to the admin through a contact form.
  - The admin receives the message via email.

### 7. **Homepage**
- **Hero Section:**
  - A welcoming section with a button to explore recipes.
- **Category Highlights:**
  - Showcases different recipe categories.


### 8. **Admin Privileges**
- Admins have additional capabilities:
  - Manage news articles, recipes, users, and FAQs.
  - Promote or demote users to/from admin roles.

---

## **Technical Details**

### **Database**
The project uses a MySQL database managed via phpMyAdmin. 

### **Routes**
- All routes use **controller methods** for proper MVC architecture.
- Routes are grouped logically and include middleware for authentication and admin access.

### **Views**
- The project uses **Blade templates** with layouts and components.
- Includes reusable components like navigation bars, footers, and modals.

### **Controllers**
- Each feature has its own controller (e.g., `RecipeController`, `NewsController`).
- Controllers handle CRUD operations and business logic.

---

## ** How to Run the Project**

### **A. Clone the Repository**
Run the following commands in your terminal:
```bash
git clone <your-github-repository-link>
cd <project-folder-name>
```

### **B. Install Dependencies**
1. Install the PHP dependencies using Composer:
   ```bash
   composer install
   ```
2. Install the JavaScript dependencies:
   ```bash
   npm install
   npm run build
   ```

### **C. Set Up the `.env` File**
1. Copy the `.env.example` file and rename it to `.env`:
   ```bash
   cp .env.example .env
   ```
2. Update the following database configuration in the `.env` file to match your local phpMyAdmin settings:
   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=root
   DB_PASSWORD=
   ```

### **D. Set Up the Database**
1. Open phpMyAdmin in your browser.
2. Create a new database with the name specified in the `DB_DATABASE` field in `.env`.
3. Run the following commands to migrate tables and seed the database with default data:
   ```bash
   php artisan migrate --seed
   ```


### **E. Start the Local Server**
Run the local development server:
```bash
php artisan serve
```
Open the application in your browser using the link provided in the terminal (e.g., `http://127.0.0.1:8000`).

---

## **3. Default Login Credentials**
You can log in as an admin using the following credentials:
- **Email:** `admin@ehb.be`
- **Password:** `Password!321`

---





<body>
  <h1>🚀 Welcome to JobQuest</h1>
  
  <p>Thank you for checking out <b>JobQuest!</b> JobQuest is an online platform that connects job seekers with potential employers, offering easy job searching, job posting, and much more! Whether you are looking to apply for a job or hire the best talent, JobQuest is your go-to destination. 🔍💼</p>
  
  <h2>🔧 Key Features</h2>
<ul>
  <li><strong>📍 Homepage:</strong> Filter jobs by <em>location</em>, <em>keywords</em>, and <em>category</em>. See <strong>popular categories</strong>, <strong>featured jobs</strong>, and <strong>latest job postings</strong>. 🏙️</li>
  
  <li><strong>💼 Job Page:</strong> Browse job listings with <strong>pagination</strong>. Filter by <em>keyword</em>, <em>category</em>, and <em>job type</em>. Sort by <em>latest</em> or <em>oldest</em>. 📊</li>
  
  <li><strong>📝 Job Details:</strong> View job details. Apply or save jobs if you're logged in. (Only logged-in users can apply or save.) 💼</li>
  
  <li><strong>🖋️ Registration:</strong> No duplicate accounts. Users can't register with an existing email. ✅</li>
  
  <li><strong>🔑 Forgot Password:</strong> Secure password reset via Gmail. Receive a link to set a new password. 📧</li>
</ul>

<h2>🔑 Forgot Password Feature</h2>
<p>The Forgot Password feature allows users to securely reset their passwords via Gmail. To enable this functionality after cloning the project, configure your <code>.env</code> file as follows:</p>

<h3>📋 Gmail Configuration Steps:</h3>
<ol>
  <li>Enable <strong>2-Step Verification</strong> for your Google Account.</li>
  <li>In the Google Account <strong>Security</strong> section, create an <strong>App Password</strong> for this project.</li>
  <li>Copy the generated App Password and paste it into the <code>MAIL_PASSWORD</code> field in your <code>.env</code> file.</li>
</ol>

<h3>Example .env Configuration:</h3>
<pre>
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
</pre>
<p>Make sure to replace <code>your-email@gmail.com</code> and <code>your-app-password</code> with your actual Gmail credentials and app-specific password.</p>


  <h2>🛠️ Admin Panel Features</h2>
  <ul>
    <li><strong>📊 Dashboard:</strong> View insightful statistics such as total users, total jobs, active/inactive jobs, and applications. 🖥️📈</li>
    <li><strong>👨‍💼 Users Management:</strong> Create, edit, remove, and search users in the system. 🔎👥</li>
    <li><strong>💼 Job Management:</strong> Admins can manage jobs posted by users (create, edit, remove jobs). 📝💼</li>
    <li><strong>📋 Applications Management:</strong> Admins can view and manage job applications. 📩📂</li>
    <li><strong>🔖 Job Categories & Types:</strong> Admins can manage job categories and job types. 📂📑</li>
  </ul>

  <h2>👥 User Panel Features</h2>
  <ul>
    <li><strong>🖋️ Post a Job:</strong> Users can post, edit, and remove their job listings. 🏢</li>
    <li><strong>🗂️ My Jobs:</strong> Users can manage their posted jobs. View, edit, or delete any job post they’ve created. 🧑‍💼</li>
    <li><strong>💾 Save Jobs:</strong> Users can save job listings to apply later, but they need to be logged in to save jobs. 💼❤️</li>
    <li><strong>📑 Applied Jobs:</strong> Users can view and manage their job applications. 📥</li>
    <li><strong>🔧 Account Settings:</strong> Users can edit their personal information and change their password. ⚙️</li>
  </ul>

  <h2>🌐 Deployment and Security</h2>
  <p>JobQuest is deployed on a secure HTTPS environment with an SSL certificate to ensure all communications between the user and the platform are encrypted. 🔐</p>
  <p>The website is live and accessible at: 🌐 <a href="https://jobquest.wuaze.com/" target="_blank">JobQuest</a></p>

  <h2>🖼️ Output Examples</h2>
   <img src="https://github.com/user-attachments/assets/729a7ffe-6100-465f-bce3-c37bab537f69" alt="Image description">
   

   <h4 align="center">Dashboard </h4>
   <img src="https://github.com/user-attachments/assets/42eda61e-c992-4069-9d72-e76ec080b27c" alt="Image description">
   <h4 align="center">Home</h4>
   <img src="https://github.com/user-attachments/assets/bdec7f3e-141e-4474-983a-c15de1490ffb" alt="Image description">
   <h4 align="center">Jobs</h4>
   <img src="https://github.com/user-attachments/assets/c12f2835-4783-476a-9cef-1df03b9c224a" alt="Image description">
    <h4 align="center">Job Details </h4>
     <img src="https://github.com/user-attachments/assets/aed57d5f-3344-44a6-aa68-f9e6234dbb04" alt="Image description">
      <h4 align="center">My Account </h4>
       

  <h2>📁 SQL File and Admin Credentials</h2>
  <p>To set up your local environment, you can import the provided SQL file to create the database structure. Use the following admin credentials to log in to the Admin Panel:</p>
  <pre><code>
Admin Email: admin@gmail.com
Admin Password: admin1234
  </code></pre>
  
  <p>🔑 Make sure you configure your <code>.env</code> file correctly after cloning the project and importing the SQL file. 🖥️</p>

  <h2>🚀 Steps to Clone and Run the Project Locally</h2>
  <ol>
    <li>Clone this repository to your local machine using the following command:</li>
    <pre><code>git clone https://github.com/akbarsami22/JobQuest.git</code></pre>
    <li>Navigate into the project directory:</li>
    <pre><code>cd JobQuest</code></pre>
    <li>Install the required dependencies using Composer:</li>
    <pre><code>composer install</code></pre>
    <li>Set up your environment variables by copying the <code>.env.example</code> file to <code>.env</code>:</li>
    <pre><code>cp .env.example .env</code></pre>
    <li>Generate the application key:</li>
    <pre><code>php artisan key:generate</code></pre>
    <li>Set up your database and import the provided SQL file.</li>
    <li>Configure Gmail in your <code>.env</code> file for the Forgot Password functionality (as mentioned earlier).</li>
    <li>Run the Laravel development server:</li>
    <pre><code>php artisan serve</code></pre>
    <li>Visit the application in your browser at <a href="http://127.0.0.1:8000" target="_blank">http://127.0.0.1:8000</a></li>
  </ol>

  <h2>🙌 Feel Free to Contribute!</h2>
  <p>If you like the project, feel free to fork it and contribute by adding new features, improving code quality, or fixing bugs. Every contribution is welcome, and I'd love to see how you improve JobQuest! 🎉</p>

  <h2>🎉 Thanks for Looking at My Repository</h2>
  <p>I hope you find JobQuest useful for building your own job portal, or perhaps just as a reference for your learning! Thank you for taking the time to explore the code. 🚀</p>

  <p>Feel free to reach out if you have any questions or suggestions. Enjoy using JobQuest! 😊</p>
</body>

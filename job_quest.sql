-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2024 at 01:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_quest`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_featured` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `is_featured`, `created_at`, `updated_at`) VALUES
(24, 'Information Technology', 1, '1', NULL, '2024-11-10 09:45:59'),
(25, 'Sales', 1, '1', NULL, '2024-11-10 09:47:09'),
(26, 'Healthcare', 1, '1', NULL, '2024-11-10 09:46:08'),
(27, 'Finance', 1, '1', NULL, '2024-11-10 09:47:20'),
(28, 'Customer Service', 1, '1', NULL, '2024-11-10 09:46:16'),
(29, 'Human Resources', 1, '1', NULL, '2024-11-10 09:47:34'),
(30, 'Engineering', 1, '1', NULL, '2024-11-10 09:46:36'),
(31, 'Design', 1, '1', NULL, '2024-11-10 09:46:50'),
(32, 'Education', 1, '0', NULL, NULL),
(33, 'Administrative', 1, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `job_type_id` bigint(20) UNSIGNED NOT NULL,
  `vacancy` varchar(255) NOT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `benefits` text DEFAULT NULL,
  `responsibility` text DEFAULT NULL,
  `qualifications` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `experience` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_location` varchar(255) DEFAULT NULL,
  `company_website` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_featured` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `user_id`, `category_id`, `job_type_id`, `vacancy`, `salary`, `location`, `description`, `benefits`, `responsibility`, `qualifications`, `keywords`, `experience`, `company_name`, `company_location`, `company_website`, `status`, `is_featured`, `created_at`, `updated_at`) VALUES
(34, 'Senior Software Engineer', 2, 24, 19, '3', 'Annual: 70,000 - 90,000', 'New York, NY', 'Develop and maintain complex software systems.', 'Health insurance, 401(k), Paid time off', 'Design, implement, and test software solutions.', 'Bachelor\'s degree in Computer Science or related field', 'Software Development, Programming, IT', '3', 'TechCorp', 'New York, NY', 'https://techcorp.com', 1, 1, '2024-11-10 15:38:23', '2024-11-10 09:51:35'),
(35, 'Regional Sales Manager', 2, 25, 20, '2', 'Annual: 50,000 - 70,000', 'Chicago, IL', 'Lead and manage the regional sales team to achieve goals.', 'Commission, Flexible work hours', 'Set sales targets, monitor performance, and mentor team members.', 'Bachelor\'s degree in Business or related field', 'Sales, Management, Leadership', '3', 'SalesPro Inc.', 'Chicago, IL', 'https://salesproinc.com', 1, 1, '2024-11-10 15:38:23', '2024-11-10 09:52:03'),
(36, 'Nurse Practitioner', 2, 26, 21, '5', 'Annual: 60,000 - 80,000', 'Los Angeles, CA', 'Provide primary and urgent care to patients in a healthcare setting.', 'Health insurance, Retirement plan', 'Diagnose and treat patients, prescribe medications, manage patient care.', 'Master\'s degree in Nursing', 'Healthcare, Patient Care, Medicine', '3', 'HealthFirst', 'Los Angeles, CA', 'https://healthfirst.com', 1, 0, '2024-11-10 15:38:23', NULL),
(37, 'Junior Financial Analyst', 2, 27, 22, '1', 'Annual: 55,000 - 75,000', 'Houston, TX', 'Support financial analysis and reporting activities within the company.', 'Health insurance, Stock options', 'Assist in financial reporting, budgeting, and data analysis.', 'Bachelor\'s degree in Finance or Accounting', 'Finance, Analysis, Reporting', '3', 'FinServe LLC', 'Houston, TX', 'https://finserve.com', 1, 1, '2024-11-10 15:38:23', '2024-11-10 09:52:16'),
(38, 'Creative Graphic Designer', 2, 31, 23, '2', 'Annual: 40,000 - 60,000', 'Remote', 'Design visually appealing graphics for a variety of media platforms.', 'Remote work, Flexible schedule', 'Create logos, web graphics, and marketing materials.', 'Bachelor\'s degree in Graphic Design or related field', 'Design, Creativity, Adobe Suite', '3', 'Creative Minds Studio', 'Remote', 'https://creativeminds.com', 1, 0, '2024-11-10 15:38:23', NULL),
(39, 'Project Manager', 2, 24, 19, '2', 'Annual: 80,000 - 100,000', 'San Francisco, CA', 'Manage and oversee project teams and client relationships.', 'Health insurance, Paid time off', 'Lead project planning, budgeting, and scheduling efforts.', 'Bachelor\'s degree in Project Management or related field', 'Project Management, Leadership, Scheduling', '3', 'ProTech Solutions', 'San Francisco, CA', 'https://protech.com', 1, 1, '2024-11-10 15:38:23', '2024-11-10 09:53:14'),
(40, 'Data Scientist', 2, 24, 19, '4', 'Annual: 90,000 - 120,000', 'Boston, MA', '<p>Analyze data to uncover insights, build predictive models, and develop data-driven business strategies.</p>', 'Health insurance, Bonus structure', 'Build models, analyze trends, and provide data-driven insights.', 'Bachelor\'s degree in Data Science or related field', 'Data Science, Machine Learning, Python', '3', 'DataGen Solutions', 'Boston, MA', 'https://datagen.com', 1, 0, '2024-11-10 15:38:23', '2024-11-11 04:13:12'),
(41, 'HR Manager', 2, 29, 20, '3', 'Annual: 60,000 - 80,000', 'Chicago, IL', 'Oversee and manage HR functions including recruitment, payroll, and compliance.', 'Health insurance, Retirement plan', 'Recruit, onboard, and support employees throughout their careers.', 'Bachelor\'s degree in Human Resources or related field', 'Human Resources, Recruitment, Employee Relations', '3', 'PeopleWorks', 'Chicago, IL', 'https://peopleworks.com', 1, 0, '2024-11-10 15:38:23', NULL),
(42, 'Marketing Specialist', 2, 31, 20, '3', 'Annual: 45,000 - 60,000', 'Miami, FL', 'Develop and execute marketing strategies to promote products or services.', 'Paid time off, Commission', 'Create campaigns, analyze metrics, and improve engagement.', 'Bachelor\'s degree in Marketing or related field', 'Marketing, Campaigns, Social Media', '3', 'MarketHub', 'Miami, FL', 'https://markethub.com', 1, 0, '2024-11-10 15:38:23', NULL),
(43, 'UX/UI Designer', 2, 31, 23, '2', 'Annual: 55,000 - 75,000', 'Remote', 'Design user interfaces and improve user experience across platforms.', 'Flexible schedule, Paid time off', 'Work with teams to create and improve user interfaces.', 'Bachelor\'s degree in Design or related field', 'Design, UX, UI, Adobe XD', '3', 'DesignPro Studios', 'Remote', 'https://designpro.com', 1, 0, '2024-11-10 15:38:23', NULL),
(44, 'Software Tester', 2, 24, 19, '3', 'Annual: 45,000 - 65,000', 'Austin, TX', 'Test software applications for bugs and ensure quality standards.', 'Health insurance, Paid time off', 'Test applications, report bugs, and improve software quality.', 'Bachelor\'s degree in Computer Science or related field', 'Software Testing, QA, Bug Tracking', '3', 'TechTesters', 'Austin, TX', 'https://techexperts.com', 1, 0, '2024-11-10 15:38:23', NULL),
(45, 'Accountant', 2, 27, 20, '4', 'Annual: 50,000 - 70,000', 'New York, NY', 'Manage financial records, tax filings, and company accounting.', 'Health insurance, Retirement plan', 'Prepare financial statements, analyze budgets, and ensure compliance.', 'Bachelor\'s degree in Accounting or related field', 'Accounting, Finance, Tax Filing', '3', 'MoneyWise', 'New York, NY', 'https://moneywise.com', 1, 0, '2024-11-10 15:38:23', NULL),
(46, 'Legal Advisor', 2, 28, 20, '1', 'Annual: 100,000 - 130,000', 'Washington, D.C.', 'Provide legal advice and representation to clients or organizations.', 'Health insurance, 401(k)', 'Advise clients on legal matters, prepare contracts, and ensure legal compliance.', 'Juris Doctor (JD) degree and license to practice law', 'Legal, Contract Drafting, Corporate Law', '3', 'LawExperts LLP', 'Washington, D.C.', 'https://lawexperts.com', 1, 0, '2024-11-10 15:38:23', NULL),
(47, 'Event Coordinator', 2, 32, 21, '3', 'Annual: 40,000 - 55,000', 'Los Angeles, CA', 'Plan and coordinate events, conferences, and meetings for clients.', 'Commission, Flexible hours', 'Manage event logistics, liaise with vendors, and ensure successful events.', 'Bachelor\'s degree in Event Management or related field', 'Event Planning, Coordination, Logistics', '3', 'EventMasters', 'Los Angeles, CA', 'https://eventmasters.com', 1, 0, '2024-11-10 15:38:23', NULL),
(48, 'IT Support Specialist', 2, 24, 22, '3', 'Annual: 40,000 - 55,000', 'Denver, CO', 'Provide technical support and troubleshooting services for IT systems.', 'Health insurance, Paid time off', 'Support internal IT systems, assist employees with technical issues.', 'Bachelor\'s degree in Information Technology or related field', 'IT Support, Troubleshooting, Networking', '3', 'TechAssist', 'Denver, CO', 'https://techassist.com', 1, 0, '2024-11-10 15:38:23', NULL),
(49, 'Business Analyst', 2, 24, 19, '3', 'Annual: 60,000 - 80,000', 'Dallas, TX', 'Analyze business processes and recommend improvements for efficiency.', 'Health insurance, Retirement plan', 'Gather and analyze data to inform business decisions.', 'Bachelor\'s degree in Business Administration or related field', 'Business Analysis, Process Improvement, Data Analysis', '3', 'BusinessPro', 'Dallas, TX', 'https://businesspro.com', 1, 0, '2024-11-10 15:38:23', NULL),
(50, 'SEO Specialist', 2, 31, 20, '2', 'Annual: 50,000 - 70,000', 'Phoenix, AZ', 'Optimize website content to improve search engine rankings.', 'Health insurance, Paid time off', 'Implement SEO strategies, analyze performance, and improve ranking.', 'Bachelor\'s degree in Marketing or related field', 'SEO, Digital Marketing, Content Optimization', '3', 'SearchMaster', 'Phoenix, AZ', 'https://searchmaster.com', 1, 0, '2024-11-10 15:38:23', NULL),
(51, 'Product Manager', 2, 24, 19, '2', 'Annual: 80,000 - 110,000', 'Seattle, WA', 'Manage product development and life cycle to ensure timely delivery.', 'Health insurance, Bonus structure', 'Define product vision, manage roadmap, and ensure market fit.', 'Bachelor\'s degree in Product Management or related field', 'Product Management, Strategy, Market Research', '3', 'ProductX', 'Seattle, WA', 'https://productx.com', 1, 0, '2024-11-10 15:38:23', NULL),
(52, 'Content Writer', 2, 31, 22, '3', 'Annual: 40,000 - 55,000', 'Remote', 'Write engaging content for blogs, websites, and marketing materials.', 'Paid time off, Flexible work hours', 'Create content, optimize for SEO, and improve online presence.', 'Bachelor\'s degree in English, Communications, or related field', 'Writing, Content Creation, SEO', '3', 'ContentCreators', 'Remote', 'https://contentcreators.com', 1, 0, '2024-11-10 15:38:23', NULL),
(53, 'Marketing Manager', 2, 31, 19, '2', 'Annual: 70,000 - 90,000', 'Boston, MA', 'Oversee the company’s marketing efforts and lead the marketing team.', 'Health insurance, Paid time off, Bonuses', 'Develop and implement marketing strategies, manage team performance.', 'Bachelor\'s degree in Marketing or related field', 'Marketing Strategy, Leadership, Team Management', '3', 'MarketInnovators', 'Boston, MA', 'https://marketinnovators.com', 1, 0, '2024-11-10 15:38:23', NULL),
(54, 'Sales Executive', 2, 25, 20, '5', 'Annual: 40,000 - 60,000', 'Los Angeles, CA', 'Sell products and services to clients, build relationships and meet targets.', 'Commission, Health benefits', 'Generate leads, close sales, and build long-term client relationships.', 'Bachelor\'s degree in Business or related field', 'Sales, Client Management, Negotiation', '3', 'SalesEdge', 'Los Angeles, CA', 'https://salesedge.com', 1, 0, '2024-11-10 15:38:23', '2024-11-11 04:11:40'),
(55, 'Customer Support Representative', 2, 28, 20, '5', 'Annual: 35,000 - 50,000', 'Chicago, IL', 'Provide support to customers via phone, email, and chat services.', 'Health insurance, Paid time off', 'Assist customers with inquiries, resolve issues, and provide product information.', 'High school diploma or equivalent', 'Customer Service, Communication, Problem Solving', '3', 'SupportLine', 'Chicago, IL', 'https://supportline.com', 1, 0, '2024-11-10 15:38:23', NULL),
(56, 'Mechanical Engineer', 2, 30, 19, '4', 'Annual: 75,000 - 95,000', 'Detroit, MI', 'Design and test mechanical systems and components for industrial applications.', 'Health insurance, Retirement plan', 'Create technical drawings, perform simulations, and work with manufacturing teams.', 'Bachelor\'s degree in Mechanical Engineering or related field', 'Engineering, Mechanical Design, CAD', '3', 'Enginex Corp.', 'Detroit, MI', 'https://enginex.com', 1, 0, '2024-11-10 15:38:23', NULL),
(57, 'Cloud Architect', 2, 24, 19, '3', 'Annual: 120,000 - 150,000', 'San Jose, CA', 'Design and implement cloud infrastructure for large-scale systems.', 'Health insurance, Stock options', 'Architect cloud systems, design scalable solutions, and manage infrastructure.', 'Bachelor\'s degree in Computer Science or related field', 'Cloud Computing, AWS, System Design', '3', 'CloudInnovations', 'San Jose, CA', 'https://cloudinnovations.com', 1, 1, '2024-11-10 15:38:23', '2024-11-10 09:53:36'),
(58, 'Civil Engineer', 2, 30, 19, '4', 'Annual: 70,000 - 90,000', 'Denver, CO', 'Design and oversee construction projects for infrastructure and buildings.', 'Health insurance, Paid time off', 'Prepare reports, collaborate with contractors, and supervise projects.', 'Bachelor\'s degree in Civil Engineering or related field', 'Civil Engineering, Construction, Project Management', '3', 'BuildIt', 'Denver, CO', 'https://buildit.com', 1, 0, '2024-11-10 15:38:23', NULL),
(59, 'Network Engineer', 2, 24, 19, '3', 'Annual: 80,000 - 100,000', 'Dallas, TX', 'Design, implement, and manage network systems for organizations.', 'Health insurance, Retirement plan', 'Install, configure, and maintain networking hardware and software.', 'Bachelor\'s degree in Network Engineering or related field', 'Networking, Security, Troubleshooting', '3', 'NetWork Solutions', 'Dallas, TX', 'https://networksolutions.com', 1, 0, '2024-11-10 15:38:23', NULL),
(60, 'Full Stack Developer', 2, 24, 19, '4', 'Annual: 85,000 - 110,000', 'Remote', 'Develop both front-end and back-end web applications for clients.', 'Flexible work schedule, Paid time off', 'Write code, manage databases, and implement user interfaces.', 'Bachelor\'s degree in Computer Science or related field', 'Full Stack Development, JavaScript, Node.js', '3', 'TechBridge', 'Remote', 'https://techbridge.com', 1, 0, '2024-11-10 15:38:23', NULL),
(61, 'Frontend Developer', 2, 24, 19, '5', 'Annual: 60,000 - 80,000', 'New York, NY', 'Develop and implement user-facing features and improve the web interface.', 'Health insurance, Paid time off', 'Write clean, scalable, and efficient code for user interfaces.', 'Bachelor\'s degree in Computer Science or related field', 'Frontend Development, HTML, CSS, JavaScript', '3', 'DevWorks', 'New York, NY', 'https://devworks.com', 1, 0, '2024-11-10 15:38:23', NULL),
(62, 'Backend Developer', 2, 24, 19, '4', 'Annual: 75,000 - 95,000', 'Chicago, IL', 'Develop the server-side logic, databases, and architecture of web applications.', 'Health insurance, Paid time off', 'Design and maintain database systems and server-side applications.', 'Bachelor\'s degree in Computer Science or related field', 'Backend Development, Databases, APIs', '3', 'CodeMasters', 'Chicago, IL', 'https://codemasters.com', 1, 0, '2024-11-10 15:38:23', NULL),
(63, 'Database Administrator', 2, 24, 20, '3', 'Annual: 80,000 - 100,000', 'Austin, TX', 'Maintain and manage databases to ensure high performance and security.', 'Health insurance, Paid time off', 'Optimize databases, monitor performance, and ensure security.', 'Bachelor\'s degree in Computer Science or related field', 'Database Management, SQL, MySQL', '3', 'DataCare Solutions', 'Austin, TX', 'https://datacare.com', 1, 0, '2024-11-10 15:38:23', NULL),
(64, 'IT Manager', 2, 24, 19, '2', 'Annual: 95,000 - 120,000', 'Miami, FL', 'Manage IT infrastructure and team to ensure smooth operations.', 'Health insurance, 401(k)', 'Supervise IT staff, handle hardware/software needs, and ensure system reliability.', 'Bachelor\'s degree in Information Technology or related field', 'IT Management, Network Security, Leadership', '3', 'TechSupport Group', 'Miami, FL', 'https://techsupport.com', 1, 0, '2024-11-10 15:38:23', NULL),
(65, 'Security Analyst', 2, 24, 21, '3', 'Annual: 70,000 - 90,000', 'Washington, D.C.', 'Monitor and protect the organization’s network from cyber threats.', 'Health insurance, Paid time off', 'Implement security protocols, conduct audits, and respond to breaches.', 'Bachelor\'s degree in Cybersecurity or related field', 'Cybersecurity, Risk Management, Security Protocols', '3', 'SecureNet', 'Washington, D.C.', 'https://securenet.com', 1, 0, '2024-11-10 15:38:23', NULL),
(66, 'Web Designer', 2, 31, 23, '2', 'Annual: 50,000 - 70,000', 'Los Angeles, CA', 'Design visually appealing and user-friendly websites for clients.', 'Health insurance, Paid time off', 'Create design layouts, ensure responsiveness, and collaborate with developers.', 'Bachelor\'s degree in Graphic Design or related field', 'Web Design, UI/UX, Photoshop, HTML', '3', 'DesignCorp', 'Los Angeles, CA', 'https://designcorp.com', 1, 0, '2024-11-10 15:38:23', NULL),
(67, 'HR Manager', 2, 29, 19, '3', 'Annual: 85,000 - 110,000', 'San Francisco, CA', 'Manage recruitment, employee relations, and HR operations for the company.', 'Health insurance, Paid vacation, 401(k)', 'Develop HR strategies, conduct interviews, and resolve employee conflicts.', 'Bachelor\'s degree in Human Resources or related field', 'Human Resources, Leadership, Employee Relations', '3', 'PeopleFirst', 'San Francisco, CA', 'https://peoplefirst.com', 1, 0, '2024-11-10 15:38:23', NULL),
(68, 'UX Designer', 2, 31, 19, '3', 'Annual: 70,000 - 95,000', 'San Francisco, CA', 'Design intuitive user experiences for web and mobile applications.', 'Health insurance, Paid time off', 'Research user needs, design wireframes, and work with developers.', 'Bachelor\'s degree in UX/UI Design or related field', 'User Experience, Wireframing, Prototyping', '3', 'DesignTech', 'San Francisco, CA', 'https://designtech.com', 1, 0, '2024-11-10 15:38:23', NULL),
(69, 'Cloud Engineer', 2, 24, 19, '2', 'Annual: 100,000 - 130,000', 'Austin, TX', 'Design and implement cloud-based solutions for scalability and efficiency.', 'Health insurance, Paid time off', 'Build and manage cloud infrastructure, automate processes, and monitor performance.', 'Bachelor\'s degree in Computer Science or related field', 'Cloud Engineering, AWS, Automation', '3', 'CloudWorks', 'Austin, TX', 'https://cloudworks.com', 1, 0, '2024-11-10 15:38:23', NULL),
(70, 'Operations Manager', 2, 28, 19, '3', 'Annual: 80,000 - 100,000', 'Chicago, IL', 'Oversee day-to-day operations of the company to ensure smooth workflows.', 'Health insurance, Bonus structure', 'Manage operations, implement processes, and improve efficiency.', 'Bachelor\'s degree in Business Administration or related field', 'Operations Management, Leadership, Process Optimization', '3', 'OpsMaster', 'Chicago, IL', 'https://opsmaster.com', 1, 0, '2024-11-10 15:38:23', NULL),
(71, 'Data Scientist', 2, 24, 19, '3', 'Annual: 95,000 - 120,000', 'Remote', 'Analyze complex data to uncover insights and inform business decisions.', 'Health insurance, Stock options', 'Build predictive models, analyze large datasets, and collaborate with teams.', 'Bachelor\'s degree in Data Science or related field', 'Data Analysis, Machine Learning, Statistics', '3', 'DataInsights', 'Remote', 'https://datainsights.com', 1, 0, '2024-11-10 15:38:23', NULL),
(72, 'E-commerce Manager', 2, 25, 19, '4', 'Annual: 70,000 - 90,000', 'New York, NY', 'Manage the online store, product listings, and customer relationships.', 'Health insurance, Paid time off', 'Develop online marketing strategies, optimize product pages, and handle sales.', 'Bachelor\'s degree in Marketing or related field', 'E-commerce, Product Listings, Digital Marketing', '3', 'ShopMasters', 'New York, NY', 'https://shopmasters.com', 1, 0, '2024-11-10 15:38:23', NULL),
(73, 'Financial Analyst', 2, 27, 19, '3', 'Annual: 60,000 - 80,000', 'Dallas, TX', 'Analyze financial data to guide investment and financial decisions for the company.', 'Health insurance, Retirement plan', 'Prepare reports, analyze trends, and provide financial advice.', 'Bachelor\'s degree in Finance or related field', 'Financial Analysis, Investment, Forecasting', '3', 'FinSolve', 'Dallas, TX', 'https://finsolve.com', 1, 0, '2024-11-10 15:38:23', NULL),
(74, 'Recruitment Specialist', 2, 29, 20, '4', 'Annual: 50,000 - 65,000', 'Houston, TX', 'Handle recruitment processes, manage job postings, and conduct interviews.', 'Health insurance, Paid time off', 'Post job listings, screen candidates, and manage interviews.', 'Bachelor\'s degree in Human Resources or related field', 'Recruitment, Interviewing, Candidate Sourcing', '3', 'TalentWorks', 'Houston, TX', 'https://talentworks.com', 1, 0, '2024-11-10 15:38:23', NULL),
(75, 'Legal Advisor', 2, 27, 19, '2', 'Annual: 100,000 - 120,000', 'Miami, FL', 'Provide legal guidance and ensure compliance with laws and regulations.', 'Health insurance, Paid vacation', 'Draft contracts, handle legal disputes, and advise management on legal matters.', 'Bachelor\'s degree in Law or related field', 'Legal Advice, Contract Law, Compliance', '3', 'LawPartners', 'Miami, FL', 'https://lawpartners.com', 1, 0, '2024-11-10 15:38:23', NULL),
(76, 'Customer Support Manager', 2, 28, 19, '3', 'Annual: 75,000 - 95,000', 'Phoenix, AZ', 'Lead customer support teams to provide excellent service and resolve issues.', 'Health insurance, 401(k)', 'Supervise customer service reps, develop training, and ensure customer satisfaction.', 'Bachelor\'s degree in Business or related field', 'Customer Service, Team Leadership, Support Strategy', '3', 'SupportMasters', 'Phoenix, AZ', 'https://supportmasters.com', 1, 0, '2024-11-10 15:38:23', NULL),
(77, 'IT Support Technician', 2, 24, 22, '4', 'Annual: 40,000 - 55,000', 'Chicago, IL', 'Provide technical support and resolve hardware and software issues for employees.', 'Health insurance, Paid time off', 'Install, configure, and troubleshoot hardware and software issues.', 'Associate\'s degree in IT or related field', 'Technical Support, Hardware, Software Troubleshooting', '3', 'TechCare', 'Chicago, IL', 'https://techcare.com', 1, 0, '2024-11-10 15:38:23', NULL),
(78, 'Digital Marketing Specialist', 2, 31, 19, '3', 'Annual: 50,000 - 70,000', 'Atlanta, GA', 'Develop and execute digital marketing strategies to drive traffic and conversions.', 'Health insurance, Paid time off', 'Manage social media accounts, run PPC campaigns, and track analytics.', 'Bachelor\'s degree in Marketing or related field', 'Digital Marketing, SEO, PPC', '3', 'MarketingEdge', 'Atlanta, GA', 'https://marketingedge.com', 1, 0, '2024-11-10 15:38:23', NULL),
(79, 'Graphic Designer', 2, 31, 19, '2', 'Annual: 45,000 - 65,000', 'Austin, TX', 'Create visual content for websites, marketing materials, and branding projects.', 'Health insurance, Paid vacation', 'Design graphics, create layouts, and develop brand concepts.', 'Bachelor\'s degree in Graphic Design or related field', 'Graphic Design, Adobe Suite, Branding', '3', 'CreativeStudio', 'Austin, TX', 'https://creativestudio.com', 1, 1, '2024-11-10 15:38:23', '2024-11-10 09:53:52'),
(80, 'Operations Coordinator', 2, 28, 19, '3', 'Annual: 55,000 - 70,000', 'Boston, MA', 'Coordinate operations and logistics for various company projects and tasks.', 'Health insurance, Paid time off', 'Schedule tasks, organize events, and manage logistics for projects.', 'Bachelor\'s degree in Operations or related field', 'Operations Management, Coordination, Project Management', '3', 'OpsCo', 'Boston, MA', 'https://opsco.com', 0, 0, '2024-11-10 15:38:23', '2024-11-10 10:10:23'),
(81, 'Research Scientist', 2, 27, 19, '2', 'Annual: 75,000 - 95,000', 'San Diego, CA', 'Conduct scientific research and experiments in relevant fields to advance knowledge.', 'Health insurance, Paid time off', 'Design experiments, collect and analyze data, and publish findings.', 'PhD in Science or related field', 'Research, Data Analysis, Experimentation', '3', 'SciLabs', 'San Diego, CA', 'https://scilabs.com', 1, 0, '2024-11-10 15:38:23', NULL),
(82, 'Network Administrator', 2, 24, 19, '3', 'Annual: 70,000 - 90,000', 'New York, NY', 'Maintain and manage the company\'s network infrastructure.', 'Health insurance, 401(k)', 'Monitor network performance, resolve issues, and ensure security.', 'Bachelor\'s degree in Computer Science or related field', 'Network Administration, Security, Routing', '3', 'NetWorks', 'New York, NY', 'https://networks.com', 1, 0, '2024-11-10 15:40:50', NULL),
(83, 'Customer Success Manager', 2, 28, 19, '2', 'Annual: 75,000 - 95,000', 'Los Angeles, CA', 'Ensure customers have an excellent experience and guide them in using the company\'s products.', 'Health insurance, Paid time off', 'Develop customer relationships, resolve issues, and track satisfaction.', 'Bachelor\'s degree in Business or related field', 'Customer Service, Success Management, Account Management', '3', 'CustomerCare', 'Los Angeles, CA', 'https://customercare.com', 1, 0, '2024-11-10 15:40:50', NULL),
(84, 'SEO Specialist', 2, 31, 19, '3', 'Annual: 50,000 - 70,000', 'San Francisco, CA', 'Optimize websites for search engines to increase traffic and rankings.', 'Health insurance, Paid vacation', 'Conduct keyword research, create SEO strategies, and analyze traffic data.', 'Bachelor\'s degree in Marketing or related field', 'SEO, SEM, Google Analytics', '3', 'SEOGrowth', 'San Francisco, CA', 'https://seogrowth.com', 1, 0, '2024-11-10 15:40:50', NULL),
(85, 'Content Writer', 2, 31, 19, '4', 'Annual: 40,000 - 55,000', 'Remote', 'Write engaging and informative content for websites, blogs, and social media.', 'Health insurance, Paid time off', 'Research topics, write articles, and collaborate with editors and marketing teams.', 'Bachelor\'s degree in English, Journalism, or related field', 'Content Writing, Copywriting, SEO', '3', 'ContentWorks', 'Remote', 'https://contentworks.com', 1, 0, '2024-11-10 15:40:50', NULL),
(86, 'Software Engineer', 2, 24, 19, '3', 'Annual: 90,000 - 110,000', 'Austin, TX', 'Develop and maintain software solutions for various projects and clients.', 'Health insurance, Paid vacation', 'Write code, debug software, and collaborate with cross-functional teams.', 'Bachelor\'s degree in Computer Science or related field', 'Software Development, Java, Python', '3', 'DevTeam', 'Austin, TX', 'https://devteam.com', 1, 0, '2024-11-10 15:40:50', NULL),
(87, 'Sales Executive', 2, 25, 19, '4', 'Annual: 55,000 - 75,000', 'Chicago, IL', 'Drive sales growth by identifying leads, negotiating, and closing deals.', 'Health insurance, Bonus structure', 'Generate leads, create sales strategies, and close deals.', 'Bachelor\'s degree in Sales or related field', 'Sales Strategy, Negotiation, Lead Generation', '3', 'SalesForce', 'Chicago, IL', 'https://salesforce.com', 1, 0, '2024-11-10 15:40:50', NULL),
(88, 'Data Analyst', 2, 24, 19, '2', 'Annual: 60,000 - 80,000', 'Seattle, WA', 'Analyze data and generate reports to assist in business decision-making.', 'Health insurance, Paid time off', 'Extract and analyze data, generate reports, and provide recommendations.', 'Bachelor\'s degree in Data Science, Statistics, or related field', 'Data Analysis, Excel, SQL', '3', 'DataInsights', 'Seattle, WA', 'https://datainsights.com', 1, 0, '2024-11-10 15:40:50', NULL),
(89, 'Event Coordinator', 2, 28, 19, '3', 'Annual: 45,000 - 60,000', 'Miami, FL', 'Organize and manage events, including conferences, meetings, and corporate gatherings.', 'Health insurance, Paid vacation', 'Coordinate logistics, liaise with vendors, and manage event schedules.', 'Bachelor\'s degree in Event Planning, Hospitality, or related field', 'Event Coordination, Vendor Management, Planning', '3', 'EventMasters', 'Miami, FL', 'https://eventmasters.com', 1, 0, '2024-11-10 15:40:50', NULL),
(90, 'Product Manager', 2, 30, 19, '2', 'Annual: 85,000 - 110,000', 'San Diego, CA', 'Lead the development and launch of new products, ensuring their success in the market.', 'Health insurance, Paid vacation', 'Develop product roadmaps, work with cross-functional teams, and manage product lifecycle.', 'Bachelor\'s degree in Business, Marketing, or related field', 'Product Management, Strategy, Marketing', '3', 'ProductPro', 'San Diego, CA', 'https://productpro.com', 1, 0, '2024-11-10 15:40:50', NULL),
(91, 'Graphic Designer', 2, 31, 19, '4', 'Annual: 50,000 - 65,000', 'Dallas, TX', 'Design marketing materials, advertisements, and website elements for clients.', 'Health insurance, Paid time off', 'Create visual concepts, collaborate with marketing teams, and design for various platforms.', 'Bachelor\'s degree in Graphic Design or related field', 'Design, Branding, Photoshop', '3', 'CreativeAgency', 'Dallas, TX', 'https://creativeagency.com', 1, 0, '2024-11-10 15:40:50', NULL),
(92, 'Cloud Architect', 2, 24, 19, '2', 'Annual: 100,000 - 130,000', 'Boston, MA', 'Design and implement cloud infrastructure for businesses, ensuring scalability, reliability, and security in the cloud environment.', 'Health insurance, Stock options', 'Architect cloud solutions, monitor performance, and troubleshoot issues.', 'Bachelor\'s degree in Computer Science, IT or related field', 'Cloud Computing, AWS, Azure, GCP', '3', 'CloudMasters', 'Boston, MA', 'https://cloudmasters.com', 1, 0, '2024-11-10 15:42:11', NULL),
(93, 'Business Analyst', 2, 24, 19, '3', 'Annual: 70,000 - 85,000', 'Atlanta, GA', 'Analyze business processes, gather requirements, and support the implementation of technology solutions to improve efficiency and productivity.', 'Health insurance, Paid time off', 'Work closely with stakeholders to analyze business needs and propose solutions.', 'Bachelor\'s degree in Business Administration, IT or related field', 'Business Analysis, Requirements Gathering, Process Improvement', '3', 'TechSolutions', 'Atlanta, GA', 'https://techsolutions.com', 1, 0, '2024-11-10 15:42:11', NULL),
(94, 'Digital Marketing Specialist', 2, 25, 19, '4', 'Annual: 50,000 - 65,000', 'New York, NY', 'Plan and execute digital marketing campaigns across multiple platforms, increasing brand awareness, engagement, and conversions.', 'Health insurance, Paid vacation', 'Create marketing strategies, manage campaigns, and analyze data to improve results.', 'Bachelor\'s degree in Marketing, Communications, or related field', 'Digital Marketing, SEM, Social Media, Google Ads', '3', 'MarketingHub', 'New York, NY', 'https://marketinghub.com', 1, 0, '2024-11-10 15:42:11', NULL),
(95, 'Financial Analyst', 2, 27, 19, '3', 'Annual: 75,000 - 95,000', 'Chicago, IL', 'Analyze financial data to help companies make informed business decisions, manage budgets, and forecast future performance.', 'Health insurance, 401(k)', 'Prepare financial reports, conduct budgeting, and identify cost-saving opportunities.', 'Bachelor\'s degree in Finance, Accounting, or related field', 'Financial Analysis, Excel, Budgeting, Forecasting', '3', 'FinCorp', 'Chicago, IL', 'https://fincorp.com', 1, 0, '2024-11-10 15:42:11', NULL),
(96, 'Software Tester', 2, 24, 19, '3', 'Annual: 60,000 - 75,000', 'Los Angeles, CA', 'Test software applications for functionality, usability, and security to ensure quality and performance standards are met.', 'Health insurance, Paid sick leave', 'Write test cases, perform manual and automated testing, report bugs, and collaborate with developers.', 'Bachelor\'s degree in Computer Science, Software Engineering or related field', 'Manual Testing, Automation Testing, QA Tools', '3', 'Testify', 'Los Angeles, CA', 'https://testify.com', 1, 0, '2024-11-10 15:42:11', NULL),
(97, 'Human Resources Manager', 2, 29, 19, '2', 'Annual: 80,000 - 100,000', 'Miami, FL', 'Lead the HR team to oversee hiring, employee relations, training, and ensure compliance with company policies and regulations.', 'Health insurance, Performance bonuses', 'Manage recruitment processes, mediate between employees and management, and foster a positive company culture.', 'Bachelor\'s degree in Human Resources, Business Administration or related field', 'Recruitment, Employee Relations, HR Compliance', '3', 'PeopleFirst', 'Miami, FL', 'https://peoplefirst.com', 1, 0, '2024-11-10 15:42:11', NULL),
(98, 'Cybersecurity Analyst', 2, 24, 19, '3', 'Annual: 85,000 - 110,000', 'Dallas, TX', 'Monitor and protect an organization’s systems and data from cyber threats, ensuring that security protocols are followed and incidents are quickly addressed.', 'Health insurance, Paid time off', 'Analyze security systems, conduct vulnerability assessments, and respond to cyber threats.', 'Bachelor\'s degree in Cybersecurity, Information Technology, or related field', 'Network Security, Firewalls, Penetration Testing', '3', 'SecureTech', 'Dallas, TX', 'https://securetech.com', 1, 0, '2024-11-10 15:42:11', NULL),
(99, 'Marketing Manager', 2, 25, 19, '2', 'Annual: 90,000 - 115,000', 'San Francisco, CA', 'Oversee the development and implementation of marketing strategies, drive customer acquisition, and improve brand recognition.', 'Health insurance, Stock options', 'Develop marketing campaigns, manage the marketing team, and analyze market trends.', 'Bachelor\'s degree in Marketing, Business Administration or related field', 'Marketing Strategy, Brand Management, SEO, Content Marketing', '3', 'BrandBoost', 'San Francisco, CA', 'https://brandboost.com', 1, 0, '2024-11-10 15:42:11', NULL),
(100, 'UX/UI Designer', 2, 31, 19, '3', 'Annual: 65,000 - 85,000', 'Austin, TX', 'Design user-friendly, intuitive interfaces for websites and mobile applications, ensuring optimal user experience across platforms.', 'Health insurance, Paid sick leave', 'Design wireframes, create prototypes, and collaborate with developers to enhance user experience.', 'Bachelor\'s degree in Design, Computer Science, or related field', 'User Experience, User Interface, Prototyping, Wireframing', '3', 'DesignWorks', 'Austin, TX', 'https://designworks.com', 1, 0, '2024-11-10 15:42:11', NULL),
(101, 'IT Support Specialist', 2, 24, 19, '4', 'Annual: 45,000 - 60,000', 'Seattle, WA', 'Provide technical support and assistance to employees and clients, troubleshooting hardware, software, and network issues.', 'Health insurance, Paid time off', 'Provide troubleshooting support, maintain hardware/software, and guide users through technical issues.', 'Associate’s degree in Information Technology or related field', 'Technical Support, Troubleshooting, Networking', '3', 'TechHelp', 'Seattle, WA', 'https://techhelp.com', 1, 0, '2024-11-10 15:42:11', NULL),
(102, 'Operations Manager', 2, 28, 19, '3', 'Annual: 70,000 - 90,000', 'Houston, TX', 'Oversee the daily operations of the company, ensuring smooth and efficient processes across all departments and teams.', 'Health insurance, Paid vacation', 'Manage operations, streamline processes, and report to upper management about performance.', 'Bachelor\'s degree in Operations Management, Business Administration, or related field', 'Operations Management, Process Improvement, Team Leadership', '3', 'OpEx Solutions', 'Houston, TX', 'https://opexsolutions.com', 1, 0, '2024-11-10 15:42:11', NULL),
(103, 'Product Designer', 2, 31, 19, '3', 'Annual: 75,000 - 95,000', 'Denver, CO', 'Design innovative and aesthetically pleasing products, focusing on both function and user experience for various industries.', 'Health insurance, Paid time off', 'Create product prototypes, collaborate with teams, and iterate designs based on user feedback.', 'Bachelor\'s degree in Industrial Design, Engineering, or related field', 'Product Design, 3D Modeling, Prototyping, User Research', '3', 'ProductLab', 'Denver, CO', 'https://productlab.com', 1, 0, '2024-11-10 15:42:11', NULL),
(104, 'Salesforce Developer', 2, 25, 19, '2', 'Annual: 80,000 - 100,000', 'Chicago, IL', 'Develop and customize Salesforce applications to meet business requirements and improve user experience.', 'Health insurance, 401(k)', 'Design and implement Salesforce solutions, integrate with other systems, and provide technical support.', 'Bachelor\'s degree in Computer Science, Information Systems, or related field', 'Salesforce, Apex, Visualforce, Lightning', '3', 'SalesforcePro', 'Chicago, IL', 'https://salesforcepro.com', 1, 0, '2024-11-10 15:42:11', NULL),
(105, 'Artificial Intelligence Engineer', 2, 24, 19, '2', 'Annual: 110,000 - 140,000', 'San Francisco, CA', 'Develop and implement AI algorithms and systems, working on machine learning models and AI applications to solve complex problems.', 'Health insurance, Stock options, Paid vacation', 'Develop and test AI models, work with data scientists and engineers, and integrate AI solutions into business processes.', 'Master\'s degree in Computer Science, Artificial Intelligence, or related field', 'Artificial Intelligence, Machine Learning, Data Science, Neural Networks', '3', 'AI Innovations', 'San Francisco, CA', 'https://aiinnovations.com', 1, 0, '2024-11-10 15:44:08', NULL),
(106, 'Web Developer', 2, 24, 19, '3', 'Annual: 60,000 - 80,000', 'Austin, TX', 'Design and develop responsive websites and web applications, working with HTML, CSS, JavaScript, and other web technologies.', 'Health insurance, Paid sick leave, Flexible working hours', 'Develop and maintain websites, troubleshoot issues, and collaborate with design teams to enhance user experience.', 'Bachelor\'s degree in Computer Science, Web Development, or related field', 'HTML, CSS, JavaScript, React, Node.js', '3', 'WebWorks', 'Austin, TX', 'https://webworks.com', 1, 0, '2024-11-10 15:44:08', NULL),
(107, 'Project Manager', 2, 29, 19, '2', 'Annual: 85,000 - 105,000', 'Chicago, IL', 'Lead projects from initiation to completion, managing resources, timelines, and budgets while ensuring client satisfaction and project goals are met.', 'Health insurance, Performance bonuses, Paid vacation', 'Develop project plans, assign tasks, communicate with stakeholders, and monitor project progress to ensure deadlines are met.', 'Bachelor\'s degree in Business Administration, Project Management, or related field', 'Project Planning, Budgeting, Stakeholder Management, Risk Management', '3', 'ProjectSolutions', 'Chicago, IL', 'https://projectsolutions.com', 1, 0, '2024-11-10 15:44:08', NULL),
(108, 'Data Scientist', 2, 24, 19, '2', 'Annual: 100,000 - 130,000', 'New York, NY', '<p style=\"font-family: Inter-Regular, Bangla968, sans-serif;\">Analyze data, build models, drive insights, and create strategies.</p><p style=\"font-family: Inter-Regular, Bangla968, sans-serif;\"><br></p>', 'Health insurance, 401(k), Flexible working hours', 'Build machine learning models, clean and preprocess data, and create data visualizations for business teams.', 'Master\'s degree in Data Science, Statistics, or related field', 'Data Analysis, Machine Learning, Python, SQL', '3', 'DataInsights', 'New York, NY', 'https://datainsights.com', 1, 0, '2024-11-10 15:44:08', '2024-11-11 04:15:44'),
(109, 'Sales Executive', 2, 25, 19, '5', 'Annual: 50,000 - 70,000', 'Houston, TX', 'Sell products and services to new and existing clients, managing relationships and achieving sales targets.', 'Health insurance, Commission-based bonuses, Car allowance', 'Prospect new clients, maintain relationships with existing clients, and achieve sales quotas.', 'Bachelor\'s degree in Business, Marketing, or related field', 'Sales, Client Relations, Negotiation, Communication', '3', 'SalesForce', 'Houston, TX', 'https://salesforce.com', 0, 0, '2024-11-10 15:44:08', '2024-11-11 04:11:29'),
(110, 'Quality Assurance Lead', 2, 24, 19, '1', 'Annual: 85,000 - 105,000', 'Los Angeles, CA', '<p>Lead the QA team to test software, ensuring products meet standards.</p>', 'Health insurance, Paid time off', 'Lead the QA team, develop test plans, perform automated and manual testing, and ensure timely delivery of high-quality software products.', 'Bachelor\'s degree in Computer Science, Quality Assurance, or related field', 'Manual Testing, Automation Testing, Leadership, QA Tools', '3', 'QualitySoft', 'Los Angeles, CA', 'https://qualitysoft.com', 1, 0, '2024-11-10 15:44:08', '2024-11-11 04:09:11'),
(111, 'Operations Analyst', 2, 28, 19, '2', 'Annual: 60,000 - 75,000', 'Dallas, TX', 'Analyze and improve operational processes and systems to enhance efficiency, reduce costs, and support strategic decision-making.', 'Health insurance, 401(k)', 'Monitor and analyze operational performance, identify inefficiencies, and recommend process improvements.', 'Bachelor\'s degree in Operations Management, Business Administration, or related field', 'Process Improvement, Data Analysis, Efficiency Optimization', '3', 'OpsTech', 'Dallas, TX', 'https://opstech.com', 1, 0, '2024-11-10 15:44:08', NULL),
(112, 'SEO Specialist', 2, 25, 19, '3', 'Annual: 55,000 - 70,000', 'Phoenix, AZ', 'Optimize website content for search engines, improving site visibility, traffic, and conversions through on-page and off-page SEO techniques.', 'Health insurance, Paid sick leave, Career development', 'Conduct keyword research, optimize content, track SEO performance, and stay updated with SEO trends and algorithm changes.', 'Bachelor\'s degree in Marketing, Communications, or related field', 'SEO, Google Analytics, Keyword Research, Content Optimization', '3', 'SEO Solutions', 'Phoenix, AZ', 'https://seosolutions.com', 1, 0, '2024-11-10 15:44:08', NULL),
(113, 'Network Engineer', 2, 24, 19, '2', 'Annual: 75,000 - 95,000', 'Denver, CO', 'Design, implement, and maintain network systems for businesses, ensuring smooth communication and data flow across departments and remote locations.', 'Health insurance, Paid vacation, Tech perks', 'Install and configure network hardware, troubleshoot connectivity issues, and ensure the security of the network infrastructure.', 'Bachelor\'s degree in Network Engineering, Computer Science, or related field', 'Networking, VPNs, Routers, Firewalls', '3', 'NetWorks', 'Denver, CO', 'https://networks.com', 1, 0, '2024-11-10 15:44:08', NULL),
(114, 'Creative Director', 2, 31, 19, '1', 'Annual: 90,000 - 110,000', 'Los Angeles, CA', 'Lead the creative team to design compelling visual content, including advertisements, websites, and other marketing materials, ensuring brand consistency across platforms.', 'Health insurance, Paid time off, Creative freedom', 'Oversee the design team, manage client projects, and ensure high-quality creative deliverables.', 'Bachelor\'s degree in Graphic Design, Fine Arts, or related field', 'Creative Direction, Branding, Adobe Creative Suite, Leadership', '3', 'CreativeWorks', 'Los Angeles, CA', 'https://creativeworks.com', 1, 0, '2024-11-10 15:44:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `applied_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(19, 'Full-Time', 1, NULL, NULL),
(20, 'Part-Time', 1, NULL, NULL),
(21, 'Internship', 1, NULL, NULL),
(22, 'Contract', 1, NULL, NULL),
(23, 'Freelance', 1, NULL, NULL),
(24, 'Remote', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_11_01_130048_create_categories_table', 2),
(6, '2024_11_01_130130_create_job_types_table', 2),
(7, '2024_11_01_130240_create_jobs_table', 2),
(8, '2024_11_02_090709_create_jobs_table', 3),
(9, '2024_11_04_102433_create_job_application_table', 4),
(10, '2024_11_04_113436_create_job_applications_table', 5),
(11, '2024_11_05_143210_create_save_jobs_table', 6),
(13, '2024_11_07_102549_alter_users_table', 7),
(14, '2024_11_10_124428_alter_categories_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('sakib@gmail.com', 'xYzQwhpW0PPApeNwcQUwDELGziRuKHrcCJssB2WkfxuWxTvHznIB1Z7SojbM', '2024-11-12 01:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `save_jobs`
--

CREATE TABLE `save_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `designation`, `image`, `mobile`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@gmail.com', NULL, 'Software Developer', '2-1731413566.png', '0123456789', 'admin', '$2y$12$zNQMxz078a3T2Bx0GcCCZOpfD0YWCKXdpSWaT0hoHMZ30uasQPBSW', NULL, '2024-10-31 04:59:39', '2024-11-12 06:13:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_user_id_foreign` (`user_id`),
  ADD KEY `jobs_category_id_foreign` (`category_id`),
  ADD KEY `jobs_job_type_id_foreign` (`job_type_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_user_id_foreign` (`user_id`),
  ADD KEY `job_applications_job_id_foreign` (`job_id`),
  ADD KEY `job_applications_employer_id_foreign` (`employer_id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `save_jobs`
--
ALTER TABLE `save_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `save_jobs_user_id_foreign` (`user_id`),
  ADD KEY `save_jobs_job_id_foreign` (`job_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `save_jobs`
--
ALTER TABLE `save_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_job_type_id_foreign` FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `save_jobs`
--
ALTER TABLE `save_jobs`
  ADD CONSTRAINT `save_jobs_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `save_jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

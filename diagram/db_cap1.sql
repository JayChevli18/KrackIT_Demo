-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 02:24 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cap`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alumni`
--

CREATE TABLE `tbl_alumni` (
  `alumni_id` int(11) NOT NULL,
  `alumni_name` text NOT NULL,
  `alumni_dob` date NOT NULL,
  `alumni_mob` bigint(20) NOT NULL,
  `alumni_email_id` varchar(50) NOT NULL,
  `alumni_institute` int(11) DEFAULT NULL,
  `alumni_dept` int(11) NOT NULL,
  `alumni_degree` int(11) NOT NULL,
  `alumni_grad_year` year(4) NOT NULL,
  `alumni_degree_file` varchar(150) NOT NULL,
  `alumni_review` varchar(1500) DEFAULT NULL,
  `alumni_gender` text NOT NULL,
  `alumni_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_alumni`
--

INSERT INTO `tbl_alumni` (`alumni_id`, `alumni_name`, `alumni_dob`, `alumni_mob`, `alumni_email_id`, `alumni_institute`, `alumni_dept`, `alumni_degree`, `alumni_grad_year`, `alumni_degree_file`, `alumni_review`, `alumni_gender`, `alumni_password`) VALUES
(2, 'demo demoe', '2008-06-29', 8745692100, 'axrr@gmail.com', NULL, 2, 1, 2012, 'Lab_09.pdf', 'This institute is best!', 'Male', 'MTI='),
(3, 'demo demoq', '2008-06-29', 8745692100, 'axrr1@gmail.com', NULL, 2, 1, 2012, 'Lab_09.pdf', 'This institute is best!', 'Male', 'MTI='),
(4, 'demo demod', '2007-01-31', 8745692100, 'd@gmail.com', NULL, 1, 2, 2011, 'Lab_09.pdf', 'This institute is best!', 'Male', 'MTU0'),
(5, 'demo demod', '2007-01-31', 8745692100, 'd1@gmail.com', NULL, 2, 1, 2011, 'Lab_09.pdf', 'This institute is best!', 'Female', 'MjIz'),
(6, 'demo demod', '2007-01-31', 8745692100, 'd12@gmail.com', NULL, 1, 2, 2011, 'Lab_09.pdf', 'This institute is best!', 'Female', 'MTI='),
(7, 'demo demod', '2007-01-31', 8745692100, 'd112@gmail.com', NULL, 2, 1, 2011, 'Lab_09.pdf', 'This institute is best!', 'Female', 'MTEy'),
(8, 'demo demod', '2007-01-31', 8745692100, 'd1112@gmail.com', NULL, 1, 2, 2011, 'Lab_09.pdf', 'This institute is best!', 'Female', 'MTEyMjI='),
(9, 'demo demodw', '1998-10-31', 8745692112, 'abc@gmail.com', NULL, 1, 4, 2019, '', 'This institute is best!', 'Male', 'MTIz'),
(10, 'demo demodw', '1998-10-31', 8745692112, 'abc1@gmail.com', 1, 4, 2, 2019, 'Lab_09.pdf', 'This institute is awesome!', 'Male', 'MTIz'),
(11, 'Jay Chevli', '2002-06-27', 6234567890, 'chevlijay70@gmail.com', 1, 2, 1, 2023, 'Untitled design (2).png', 'This institute is best!', 'Male', 'MjM0NTY3ODlqYw=='),
(12, 'testing name', '1998-06-30', 6987456321, 'test@gmail.com', 2, 2, 1, 2018, 'G3_202312049_Lab-7.pdf', 'This institute is best!', 'Male', 'MTIzNDU2Nzg5amM=');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alumni_query`
--

CREATE TABLE `tbl_alumni_query` (
  `cc_query_id` int(11) NOT NULL,
  `cc_query_username` text NOT NULL,
  `cc_query_email` varchar(50) NOT NULL,
  `cc_query_description` varchar(1000) NOT NULL,
  `cc_query_ans` varchar(1000) DEFAULT NULL,
  `cc_alumni_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_alumni_query`
--

INSERT INTO `tbl_alumni_query` (`cc_query_id`, `cc_query_username`, `cc_query_email`, `cc_query_description`, `cc_query_ans`, `cc_alumni_id`) VALUES
(1, 'Demo Naame', 'user@gmail.com', 'Which is toughest exam', 'JEE', 10),
(2, 'user', 'user@gmail.com', 'how to crack DAIICT?', '', 11),
(3, 'demo jay daiict', '202312049@daiict.ac.in', 'how was your experience at daiict?', 'Good!', 11),
(4, 'demo jay daiict', '202312049@daiict.ac.in', 'Is DAIICT better than NIT Surat?', 'Both are good in there domain. DAIICT is good for IT.', 11),
(15, 'demo user', 'demo_user@gmail.com', 'IS NMIMS good?', 'Yes, Offcourse!', 10),
(16, 'demo user', 'demo_user@gmail.com', 'Is Data Science is good in NMIMS?', NULL, 10),
(18, 'demo user', 'demo_user@gmail.com', 'Is NMIMS good in sport?', NULL, 10),
(19, 'Jay DAIICT', '202312049@daiict.ac.in', 'Is NMIMS good?', 'Yes! Offcourse!', 10),
(20, 'Jay Chevli', 'chevlijay70@gmail.com', 'How is NMIMN?', 'Very good!', 10),
(21, 'demo user', 'demo_user@gmail.com', 'Testing!!!!', 'Successs!!!!', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cat`
--

CREATE TABLE `tbl_cat` (
  `cc_cat_qstn_id` int(11) NOT NULL,
  `cc_cat_qstn` varchar(255) DEFAULT NULL,
  `cc_cat_opt_1` varchar(255) DEFAULT NULL,
  `cc_cat_opt_2` varchar(255) DEFAULT NULL,
  `cc_cat_opt_3` varchar(255) DEFAULT NULL,
  `cc_opt_1_recommendation` int(11) DEFAULT NULL,
  `cc_opt_2_recommendation` int(11) DEFAULT NULL,
  `cc_opt_3_recommendation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cat`
--

INSERT INTO `tbl_cat` (`cc_cat_qstn_id`, `cc_cat_qstn`, `cc_cat_opt_1`, `cc_cat_opt_2`, `cc_cat_opt_3`, `cc_opt_1_recommendation`, `cc_opt_2_recommendation`, `cc_opt_3_recommendation`) VALUES
(1, 'What are your main interests?', 'Problem-solving and analytical tasks', 'Working with technology and computers', 'Interacting with people and helping others', 11, 4, 1),
(2, 'What are your greatest strengths?', 'Logical thinking and attention to detail', 'Creativity and innovation', 'Empathy and communication skills', 2, 3, 1),
(3, 'Which personality traits do you identify with?', 'Introverted, methodical, and detail-oriented', 'Outgoing, adaptable, and adventurous', 'Compassionate, cooperative, and empathetic', 5, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `cc_city_id` int(11) NOT NULL,
  `cc_city_name` text NOT NULL,
  `cc_state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`cc_city_id`, `cc_city_name`, `cc_state_id`) VALUES
(1, 'Surat', 1),
(2, 'Mumbai', 2),
(3, 'Chennai', 10),
(4, 'Banglore', 11),
(5, 'Jharkhand', 15),
(6, 'Rajkot', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `cc_course_id` int(11) NOT NULL,
  `cc_course_name` varchar(250) NOT NULL,
  `cc_course_description` varchar(5000) DEFAULT NULL,
  `cc_dept_id` int(11) NOT NULL,
  `cc_course_img` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`cc_course_id`, `cc_course_name`, `cc_course_description`, `cc_dept_id`, `cc_course_img`) VALUES
(1, 'BBA', 'BBA full form is Bachelor of Business Administration. BBA course deals with knowledge and training management and administration of business by imparting managerial and entrepreneurial skills to management aspirants from any stream like Science, commerce or arts. BBA develops entrepreneurship skills.\r\n\r\n\r\nBBA Course: Key Highlights\r\nBBA is a popular undergraduate course.\r\nStudents from all three fields, i.e. Science, Commerce and Arts can pursue the course.\r\nA full-time BBA is a three-year course divided into six semesters. However, there are various dual degree BBA courses such as BBA LLB and Integrated MBA which are five-year duration courses.\r\nAdmissions to BBA are provided on the basis of merit as well as entrance exam scores.\r\nBBA can be pursued in full-time, part-time, correspondence or online modes of education. BBA full-time is the most popular among all. \r\nStudents can pursue the BBA course after completing Class 12.\r\nWhy Do BBA?\r\nFor students who wish to build a career in the management or business fields after Class 12, BBA is the perfect option. With the cut-throat competition in the business and corporate world, one needs to have strong leadership and managerial skills if one wishes to have a flourishing career in the field. A student who pursues BBA after Class 12 will have a wide range of job opportunities available to him/her. BBA graduates can also opt for higher studies such as MBA to fast track their career in the management and business field. Here are a few reasons why should one pursue a BBA course:\r\n\r\nA stepping stone in the careers of students who wish to excel in the business and management world.\r\nBetter career opportunities.\r\nGood salary.\r\nA better understanding of market requirements and various global trends that is required for different careers in this field.\r\nBBA course will impart the knowledge required to study further in the same field.\r\nDevelop leadership, managerial, entrepreneurial and people skills.', 2, 'bba.jpg'),
(2, 'Data Science', 'Data science is a research field that combines domain expertise, programming skills, and knowledge of mathematics and statistics to extract meaningful information from data. In turn, these systems generate information that analysts and business users can translate into tangible business value. Data science is a very profitable career choice. The most important thing is data science work. Their images are different and require special experience. India is the second largest hiring country in fields such as data science or data analysis, with 50,000 vacancies. The annual income of an entry-level data scientist with 1 to 4 years of experience is approximately INR 610,811 per annum. Currently, the opportunities for Indian analysts and data scientists are the best.', 1, 'datasci.jpg'),
(3, 'Bachelor of Fine Arts', 'Bachelor of Fine Arts deals with visual, performing or fine arts such as painting, animation or pottery. BFA is also known as Visual arts in some cases. BFA Syllabus includes subjects like painting, illustration, history, graphics, etc.', 3, 'finearts.jpg'),
(4, 'Cloud Computing', 'Cloud computing is a method of computing where a shared group of resources such as file storage, web servers, data processing services and applications are accessed via the internet. Resources are housed in data centers around the world and are available to any person or device connected to the web', 1, 'cloudcomputing.jpg'),
(5, 'Bsc Chemistry', 'BSc Chemistry focuses on the study of various branches of chemistry such as Inorganic Chemistry, Organic Chemistry, Physical Chemistry and Analytical Chemistry along with elective subjects like Analytical methods in Chemistry, Polymer Chemistry and Industrial Chemicals and Environment.', 4, 'bsc_chemistry.jpg'),
(6, 'Bcom', 'B Com Syllabus includes subjects such as Corporate Tax, Financial Law, Economics, Accounts, etc. Each B Com subject constitutes a weightage of 100 marks, which includes an internal assessment of 20 marks, and an external examination of 80 marks. Subjects of BCom are divided into 6 semesters over a course of 3 years. Candidates have to study 4 core subjects covering topics such as Accounting, Banking, Finance, etc along with 1 elective each year such as English, Economics, Philosophy, etc.\r\n\r\nB Com course is one of the most popular courses after the 12th. It can be pursued online and through B Com distance mode. The syllabus for B Com online is much similar to the regular B Com syllabus. Various types of B Com courses have been getting popular such as B Com LLB, B Com with CA, B Com with ACCA, B Com with CMA, B Com-MCom Integrated and B Com with Corporate Secretaryship. ', 6, 'bcom.jpg'),
(11, 'B.C.A', 'Bachelor of Computer Application helps interested students in setting up a sound academic base for an advanced career in Computer Applications.The course of BCA includes database management systems, operating systems, software engineering, web technology and languages such as C, C++, HTML, Java etc.', 1, 'bca.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dept`
--

CREATE TABLE `tbl_dept` (
  `cc_dept_id` int(11) NOT NULL,
  `cc_dept_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dept`
--

INSERT INTO `tbl_dept` (`cc_dept_id`, `cc_dept_name`) VALUES
(1, 'IT'),
(2, 'Management'),
(3, 'Arts'),
(4, 'Science'),
(6, 'Commerce'),
(7, 'Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_entrance_exam`
--

CREATE TABLE `tbl_entrance_exam` (
  `cc_exam_id` int(11) NOT NULL,
  `cc_exam_name` varchar(200) NOT NULL,
  `cc_exam_website` varchar(3000) NOT NULL,
  `cc_full_form` varchar(200) NOT NULL,
  `cc_exam_conductby` varchar(200) NOT NULL,
  `cc_eligibility` varchar(1000) NOT NULL,
  `cc_exam_about` text NOT NULL,
  `cc_exam_benefits` varchar(5000) NOT NULL,
  `cc_exam_logo` varchar(1000) NOT NULL,
  `cc_exam_cutoff` varchar(500) NOT NULL,
  `cc_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_entrance_exam`
--

INSERT INTO `tbl_entrance_exam` (`cc_exam_id`, `cc_exam_name`, `cc_exam_website`, `cc_full_form`, `cc_exam_conductby`, `cc_eligibility`, `cc_exam_about`, `cc_exam_benefits`, `cc_exam_logo`, `cc_exam_cutoff`, `cc_price`) VALUES
(8, 'JEE', 'https://jeemain.nta.ac.in/', 'Joint Entrance Examination', 'NTA :- National Testing Agency', 'Educational Qualification: Candidates who appeared/appearing for class 12th/equivalent in 2022, 2023, or 2024 are eligible for JEE Main 2024.\n\nAge Limit: No specific age limit mentioned.', 'JEE is a national-level entrance exam for engineering courses that takes place every year throughout India.JEE-Main is conducted by National Testing Agency (NTA). JEE-Main has two papers, Paper-I and Paper-II. Candidates may opt for either or both of them. Both papers contain multiple choice questions. Paper-I is for admission to B.E./B.Tech courses and is conducted in a Computer Based Test mode. Paper-II is for admission in B.Arch and B.Planning courses and will also be conducted in Computer Based Test mode except for one paper, namely the \'Drawing Test\' which shall be conducted in Pen and Paper mode or offline mode. From January 2020 onwards, an additional Paper-III is being introduced for B.Planning courses separately.', 'The Joint Entrance Examination (JEE) presents a plethora of benefits to aspiring students, serving as a gateway to esteemed institutions and promising career prospects. Foremost, excelling in JEE opens doors to admission in top-tier engineering colleges across the nation, renowned for their exceptional academic standards and innovative learning environments. The comprehensive nature of JEE preparation equips students with a robust foundation in science and mathematics, nurturing critical thinking skills and problem-solving abilities essential for success not only in engineering but also in various other disciplines. Furthermore, JEE provides a platform for students to showcase their talents and potentials on a national scale, fostering competitiveness and driving academic excellence. Beyond academic endeavors, a strong performance in JEE opens avenues for scholarships, sponsorships, and prestigious opportunities, facilitating holistic development and empowering students to realize their aspirations in the dynamic realm of science and technology.', 'jee-main-logo.jpg', 'JEECUTOFF.jpeg', 999),
(9, 'NEET', 'https://exams.nta.ac.in/NEET/', 'National Eligibility cum Entrance Test', 'NTA :- National Testing Agency', 'Minimum age of 17 years by admission or before December 31st of the joining year. No upper NEET Age Limit for UG applicants. Must have individually passed Physics, Chemistry, Biology/Biotechnology, and English. Minimum aggregate of 50% in Physics, Chemist', 'The National Eligibility cum Entrance Test (NEET) is conducted by the National Testing Agency (NTA). NEET is held for admission to MBBS and BDS courses in India. The test comprises three sections – physics, chemistry and biology. Candidates have to attempt all the questions in order to qualify for admission.', '\nThe National Eligibility cum Entrance Test (NEET) stands as a cornerstone for aspiring medical professionals, offering an array of invaluable benefits. Firstly, NEET serves as a gateway to the most esteemed medical colleges and universities across the country, providing students with access to top-tier medical education and training facilities. By adhering to a rigorous syllabus encompassing biology, chemistry, and physics, NEET not only prepares students for the challenges of medical school but also instills a deep understanding of foundational scientific principles essential for a successful medical career. Moreover, NEET fosters a spirit of meritocracy and fair competition, ensuring that admissions are based solely on academic merit, thus promoting transparency and integrity in the selection process. Beyond academic pursuits, excelling in NEET opens up opportunities for scholarships, research grants, and international collaborations, empowering aspiring doctors to make significant contributions to healthcare innovation and societal well-being. Ultimately, NEET serves as a transformative journey that not only shapes the future of medical professionals but also nurtures compassionate and competent healthcare leaders dedicated to serving humanity.', 'NEET_EXAM_LOGO.jpeg', 'NEETCUTOFF.jpeg', 999),
(10, 'BITSAT', 'https://cdn3.digialm.com/EForms/configuredHtml/1823/87190/Index.html', 'Birla Institute of Technology and Science Admission Test', 'Birla Institute of Technology and Science Admission Test (BITSAT)', 'candidates should have passed the 12th class examination of 10+2 system from a recognized Central or State board or its equivalent with Physics, Chemistry, and Mathematics and adequate proficiency in English.', 'Birla Institute of Technology and Science Admission Test (BITSAT) is an entrance exam conducted by the Birla Institute of Technology and Science (BITS), Pilani, for admissions to undergraduate engineering courses (BE) at its three campuses located at Pilani, Goa and Hyderabad. Admissions are offered annually to the candidates into BE, BPharm and MSc programmes after qualifying for the admission test. The entrance exam is conducted online and around 3 lakh students apply for it every year. ', 'The Gujarat Common Entrance Test (GUJCET) exam provides an expansive array of career pathways, encompassing fields such as engineering, technology, and pharmacy. This comprehensive offering empowers students to select courses in alignment with their passions and professional aspirations, fostering a journey tailored to their individual interests and career objectives.', 'BITSAT_EXAM-LOGO.jpg', 'BITSATCUTOFF.jpeg', 499),
(11, 'GUJCET', 'https://gujcet.gseb.org/', 'Gujarat Common Entrance Test', 'GSEB :- the Gujarat Secondary and Higher Secondary Education Board.', 'NIOS class 10th and 12th passed students are also eligible to apply for GUJCET 2024 exam. You must have passed your class twelfth with at least 45% of marks. ', '\nGUJCET is a state-level entrance exam for admission to engineering and pharmacy programs in Gujarat. It assesses candidates\' knowledge in Physics, Chemistry, and Mathematics/Biology. It\'s essential for students aspiring to join Gujarat colleges.\nGujarat Common Entrance Test (GUJCET), is the entrance exam conducted to shortlist candidates for admission to BTech and BPharma programs offered by various colleges in Gujarat. The exam is conducted by the Gujarat Secondary and Higher Secondary Education Board.', 'The Gujarat Common Entrance Test (GUJCET) exam provides an expansive array of career pathways, encompassing fields such as engineering, technology, and pharmacy. This comprehensive offering empowers students to select courses in alignment with their passi', 'GUJCUT_EXAM_LOGO.jpg', 'GUJCUTCUTOFF.jpeg', 299);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_institute`
--

CREATE TABLE `tbl_institute` (
  `cc_ins_id` int(11) NOT NULL,
  `cc_ins_name` varchar(300) NOT NULL,
  `cc_ins_establish` varchar(50) DEFAULT NULL,
  `cc_ins_sector_id` int(11) NOT NULL,
  `cc_ins_doj` date NOT NULL,
  `cc_ins_desc` varchar(5000) NOT NULL,
  `cc_ins_eligibilty` varchar(2000) NOT NULL,
  `cc_ins_admission` varchar(100) NOT NULL,
  `cc_state_id` int(11) DEFAULT NULL,
  `cc_city_id` int(11) DEFAULT NULL,
  `cc_ins_link` varchar(800) NOT NULL,
  `cc_ins_address` varchar(500) NOT NULL,
  `cc_ins_logical_add` varchar(500) DEFAULT NULL,
  `cc_ins_cutoff` float DEFAULT NULL,
  `cc_ins_placement_report` varchar(300) NOT NULL,
  `cc_ins_email_id` varchar(250) NOT NULL,
  `cc_ins_contact` bigint(20) NOT NULL,
  `cc_ins_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_institute`
--

INSERT INTO `tbl_institute` (`cc_ins_id`, `cc_ins_name`, `cc_ins_establish`, `cc_ins_sector_id`, `cc_ins_doj`, `cc_ins_desc`, `cc_ins_eligibilty`, `cc_ins_admission`, `cc_state_id`, `cc_city_id`, `cc_ins_link`, `cc_ins_address`, `cc_ins_logical_add`, `cc_ins_cutoff`, `cc_ins_placement_report`, `cc_ins_email_id`, `cc_ins_contact`, `cc_ins_img`) VALUES
(1, 'Narsee Monje Institute of Management Studies(NMIMS)', '1981', 2, '2022-08-01', 'AN UNPARALLELED LEGACY\r\n\r\nWhat started with baby steps in 1981, NMIMS has today emerged as a globally reputed university. Always socially conscious, the Shri Vile Parle Kelavani Mandal (SVKM) made the decision to cater to the rising demand of management institutes in the country. This led to the birth of the Narsee Monjee Institute of Management Studies (NMIMS). It began humbly by offering two-year full-time master’s programme in management studies with 4 full time faculty, 3162 books and an intake of 40 students above Bhaidas Hall, Vile Parle (West), Mumbai.\r\n\r\nEVOLUTION AND GROWTH\r\n\r\nFrom its temporary location at Bhaidas auditorium, NMIMS moved to a large complex of over 5,50,000 sq feet where it stands today as a landmark in the heart of Mumbai at Vile Parle, an affluent suburb of the city.\r\n\r\nBuilt on this inspiring legacy, today, NMIMS stands proud as a Deemed to be University offering multiple disciplines across multiple campuses. What started as an institute in a small building has caught the attention of the world, thanks to their 17 specialized schools. More than 17000 students and about 750 full-time faculty members, 10 faculty members with Fulbright Scholarship and Humboldt International Scholarship for post-doctoral researchers are part of India\'s most sought after academic community. The consistent academic quality, research focus, faculty from top national and global institutes and strong industry linkages at NMIMS have placed it amongst the nation\'s prime centers of educational excellence and research today.', 'A candidate must have passed 10+2 or equivalent examination and must have obtained a minimum of 60% aggregate marks for being eligible to BBA/B.Sc. Finance & B. Com (Hons) program .', 'Admission Date will be announced soon.', 2, 2, 'https://www.nmims.edu/', 'Narsee Monje Institute of Management Studies(NMIMS),\r\nV. L. Mehta Road, Vile Parle,\r\nWest, Mumbai, Maharashtra, India, Pin Code - 400 056', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.099082007963!2d72.83441011437722!3d19.103308756078924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c9b8676487ef%3A0x2c4fac1c801d5128!2sNMIMS%20Deemed-to-be-University!5e0!3m2!1sen!2sin!4v1661258714136!5m2!1sen!2sin', 92.5, 'nmims.pdf', 'enquiry.kpmsol@nmims.edu ', 2242355555, 'nmims_bba_1.jpg'),
(2, 'Loyola College', 'July 1925', 2, '2022-08-05', 'Loyola College, a Catholic Minority Institution, was founded by the Society of Jesus (Jesuits) in 1925, with the primary objective of providing University Education in a Christian atmosphere for deserving students irrespective of caste and creed. \r\n\r\nIt started functioning in July 1925 with just 75 students on the rolls in three undergraduate courses of Mathematics, History and Economics.\r\n\r\nLoyola College, though affiliated to University of Madras, became autonomous in July 1978. It is autonomous, in the sense that it is empowered to frame its own course of studies and adopt innovative methods of teaching and evaluation. The University degrees will be conferred on the students passing the examinations conducted by the college.\r\n\r\nUGC conferred the status of “College with potential for Excellence” on Loyola College in 2004 and confirmed the same in 2010. \r\n\r\nNAAC\'s re-accreditation score in 2012 (Third Cycle) is 3.70 out of 4.00 CGPA. \r\n\r\nUGC has elevated Loyola College to the status of “College of Excellence” for the period from April 1, 2014 till March 31, 2019. \r\n\r\nToday, there are 19 P.G courses and 19 U.G courses (Arts, Sciences and Commerce) and 12 special Institutes offering various programs to 12,107 students. 11 departments are offering M.Phil. programs and 12 departments offer Ph.D. programs. At present, 117 teaching staff members out of 286 hold doctoral degree. There are 182 non-teaching staff in service.', 'B.Sc. (Statistics / Mathematics / Computer Science)', 'Starts from 10/6/2022', 10, 3, 'https://www.loyolacollege.edu/', 'Loyola College, PB 3301, 01, Sterling Road, Nungambakkam, Chennai - 600 034', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15554586.758016089!2d70.42987706714476!3d17.861753233076524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a52678442b9cab3%3A0xfe3d86401c60ec27!2sLoyola%20College!5e0!3m2!1sen!2sin!4v1661258307696!5m2!1sen!2sin', 80.23, 'loyolaclg.pdf', 'hoddatascience@loyolacollege.edu', 4428178291, 'loyola_datascience.jpg'),
(3, 'Christ University', '1969', 2, '2022-08-26', 'Christ University is a deemed-to-be university located in Bangalore, Karnataka. Christ University has closed the application process for UG, PG, and PhD admission 2022. Christ University entrance test (CUET) for round-5 admission to UG courses will be conducted on July 14, 2022 and MP_PI will start from July 15, 2022. The round-4 entrance test for PG courses will be held on July 9, 2022 and MP_PI for the same is scheduled to be conducted from July 11, 2022. The final result for admission to UG and PG courses will be released on July 23 and July 17, 2022, respectively. Group discussion for Christ University MBA admission (session-4) will be held on July 9, 2022. Micro Presentation & Personal Interview for MBA is scheduled to be conducted between July 9 and July 12, 2022.\r\n\r\nChrist University is recognised as an Institution with Potential for Excellence by the UGC. Accredited with an ‘A’ grade by NAAC, the university is ranked 601-650 in the QS Asia University Rankings 2022. Christ University has five campuses out of which 3 are located in Bangalore and the other two are in Delhi NCR and Lavasa (Pune).\r\n\r\n\r\nChrist University offers UG, PG, and Ph.D. programs through all five campuses. The university is quite popular for its B.Tech, and MBA programs. Every year more than 25000 students enroll in Christ University. Students aspiring to get admission into B.Tech should appear for the COMEDK exam. For those applying for Christ University MBA admission, appearing for the national-level management exams is a must. Christ University conducts the CUET entrance test for most of its UG and PG courses. The final selection is done on the basis of Micro Presentation (MP), Personal Interview (PI), and Skill Assessment (SA) for all the courses.\r\n\r\n\r\nChrist University placement records are increasing every year. As per the 2022 placement stats, there has been a significant increase of 26.98% in the highest CTC and 16.66% in the average package. The highest CTC offered is INR 20 LPA and the average package stood at INR 10 LPA. Some of the top visiting companies at Christ University are Morphle Labs, Ab InBev, Tekion, Salesforce, ZS Associates, FIS Global, DE Shaw & Co, etc.', 'Eligibility for the programme is a pass at the +2 level (Karnataka PUC / ISC / CBSE / NIOS / State Boards) in any stream (Humanities, Social Sciences, Commerce & Management, Sciences) from any recognised Board in India.\n\nCandidates writing the +2 examinations in March-May 2022 may apply with their class X and XI marks.\n\nStudents pursuing International curriculum must note that eligibility is according to AIU stipulations:\n\nApplicants pursuing IB curriculum must have 3 HL and 3 SL with 24 credits.\n\nApplicants pursuing GCE / Edexcel must have a minimum of 3 A levels with a grade not less than C.', 'Admission Date will be announced soon', 11, 4, 'https://christuniversity.in/', 'Christ University,\r\nDharmaram College Post,\r\nHosur Road, \r\nBengaluru - 560029,\r\nKarnataka,\r\nIndia', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d124423.32936503542!2d77.48611742862606!3d12.957190493557233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae15b277a93807%3A0x88518f37b39dabd0!2sChrist%20(Deemed%20to%20be%20University)!5e0!3m2!1sen!2sin!4v1661520513604!5m2!1sen!2sin', 75.54, 'christunv.pdf', 'mail@christuniversity.in', 8040129100, 'christunv.jpg'),
(5, 'VNSGU', '1985', 1, '2022-09-10', 'Veer Narmad South Gujarat University has endeavoured to be an institution of excellence in higher education since its existence, keeping in view the regional needs and the emerging trends in the global scenario. A semi-urban University located at Surat city, the University has a campus spread over 210 acres. The University, re-accredited ‘A’ grade with 3.02 CGPA by the National Accreditation and Assessment Council in 2017, is also accredited with ‘B++’ grade with 2.90 CGPA under Academic and Administrative Audit (AAA) by Knowledge Consortium of Gujarat, Education Department, Government of Gujarat in 2016. The university was originally established under the South Gujarat University Act, 1965 passed by the Gujarat State Legislative Assembly. It became functional from the academic year of 1966 and was incorporated as a University on 23 May, 1967. Recognized by the University Grants Commission in 1968, it was renamed as Veer Narmad South Gujarat University in 2004 after the great Gujarati poet Narmad, Narmadshankar Lalshankar Dave. The mandate of the University is to meet the developmental needs of the seven districts and two Union Territory in the region and attempts at realizing their potential in every walk of life ranging from technology, business, industry and commerce to language, culture, and fine arts.', 'Candidates must have cleared their Class 12th in science subjects with a minimum percentage of 50% to 60% aggregate marks from a recognized board.', 'Date Will Be Announced Soon', 1, 1, 'https://www.vnsgu.ac.in/', 'Veer Narmad South Gujarat University\r\nPost Box No 49, Udhna Magdalla Road\r\nSurat – 395007, Gujarat, INDIA', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.9716977301205!2d72.78099961493473!3d21.153524585930874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04df15a760c8d%3A0x202f5132f3a6aa2d!2sVeer%20Narmad%20South%20Gujarat%20University!5e0!3m2!1sen!2sin!4v1662987665981!5m2!1sen!2sin', 60.23, 'vnsgu.pdf', 'info@vnsgu.ac.in', 9800100023, 'vnsguimg.jpg'),
(6, 'Sarvajanik University', '2021', 2, '2022-09-11', 'The establishment date of Sarvajanik University is 1st June, 2021. The Sarvajanik Education Society has established the University under Gujarat Private Universities Act No. 8 of 2009 and Amendment Gujarat Private Universities Act No. 15 of 2021.\r\n\r\nAt the core of Sarvajanik University is an ‘Integrated, Inclusive & Innovative’ approach. To guide, educate, mentor the youth of the nation, under the institutional umbrella of the University is the key objective. Under its aegis are eight constituent institutes imparting education in domains of Arts, Business, Commerce, Architecture and Design, Engineering, Law, Management, Science and Humanities.\r\n\r\nThe Gujarati word ‘Sarvajanik’ translates as Universal, Public and inherent in it, is the notion of “Inclusiveness”. This essence is carried forward as the integration of various institutes of excellence, which existed as separate bodies in the Sarvajanik Education Society.\r\n\r\nCore human values have been integrated in the Interdisciplinary understanding of theories and practicalities of life skills. The students will contribute holistically to the development of progressive communities and enlightened societies through determined collaborative exchange of knowledge and expertise with other educational institutions globally as well as locally.\r\n\r\nValues that encourage civic participation, ethical professional practice & happy community living have been incorporated in the curriculum.', 'Eligibility for the programme is a pass at the +2 level (Karnataka PUC/GHSEB/CBSE / ISC / CBSE / NIOS / State Boards) in any stream (Humanities, Social Sciences, Commerce & Management, Sciences) from any recognised Board in India.\r\n\r\nCandidates writing the +2 examinations in March-May 2022 may apply with their class X and XI marks.\r\n\r\nStudents pursuing International curriculum must note that eligibility is according to AIU stipulations:\r\n\r\nApplicants pursuing IB curriculum must have 3 HL and 3 SL with 24 credits.\r\n\r\nApplicants pursuing GCE / Edexcel must have a minimum of 3 A levels with a grade not less than C.', 'From 15,July 2022', 1, 1, 'https://sarvajanikuniversity.ac.in/', 'SCET Campus, TIFAC-CORE Building, R. K. Desai Marg, Athwalines, Surat-395001,\r\nGujarat, India.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.2400655385336!2d72.80646191440991!3d21.182620287884966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04fb180627653%3A0x588c26ed8a57987a!2sSARVJANIK%20UNIVERSITY!5e0!3m2!1sen!2sin!4v1663043220127!5m2!1sen!2sin', 83.25, 's_u.pdf', 'info@sarvajanikuniversity.ac.in', 7801243697, 'su.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ins_course`
--

CREATE TABLE `tbl_ins_course` (
  `cc_ins_course_id` int(11) NOT NULL,
  `cc_course_id` int(11) NOT NULL,
  `cc_ins_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ins_course`
--

INSERT INTO `tbl_ins_course` (`cc_ins_course_id`, `cc_course_id`, `cc_ins_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 3),
(4, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ins_exam`
--

CREATE TABLE `tbl_ins_exam` (
  `cc_ins_exam_id` int(11) NOT NULL,
  `cc_ins_id` int(11) NOT NULL,
  `cc_exam_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ins_exam`
--

INSERT INTO `tbl_ins_exam` (`cc_ins_exam_id`, `cc_ins_id`, `cc_exam_id`) VALUES
(1, 2, 9),
(2, 1, 8),
(3, 1, 9),
(4, 5, 8),
(5, 3, 8),
(6, 5, 11),
(7, 6, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `cc_email_id` varchar(100) NOT NULL,
  `cc_password` varchar(50) NOT NULL,
  `cc_flag` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`cc_email_id`, `cc_password`, `cc_flag`) VALUES
('202312049@daiict.ac.in', 'MTIzNDU2Nzg5amM=', 0),
('abc1@gmail.com', 'MTIz', 2),
('abc@gmail.com', 'MTIz', 2),
('axrr1@gmail.com', 'MTI=', 2),
('axrr@gmail.com', 'MTI=', 2),
('chevlijay70@gmail.com', 'OTg3NjU0MzIxamM=', 0),
('d1112@gmail.com', 'MTEyMjI=', 2),
('d112@gmail.com', 'MTEy', 2),
('d12@gmail.com', 'MTI=', 2),
('d1@gmail.com', 'MjIz', 2),
('d@gmail.com', 'MTU0', 2),
('demo_user@gmail.com', 'MTIz', 0),
('jconeseven@gmail.com', 'amNvbmVzZXZlbjE3', 1),
('parth@gmail.com', 'MTIz', 0),
('raj@gmail.com', 'MTIzNDU2Nzg5amM=', 0),
('test@gmail.com', 'MTIzNDU2Nzg5amM=', 2),
('user@gmail.com', 'MTIz', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otp1`
--

CREATE TABLE `tbl_otp1` (
  `otp_id` int(11) NOT NULL,
  `otp` int(11) NOT NULL,
  `is_expired` int(11) NOT NULL,
  `otp_date` datetime NOT NULL,
  `cc_user_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_otp1`
--

INSERT INTO `tbl_otp1` (`otp_id`, `otp`, `is_expired`, `otp_date`, `cc_user_email`) VALUES
(1, 545867, 1, '2022-08-19 08:10:04', NULL),
(2, 699676, 1, '2022-08-19 09:34:51', NULL),
(3, 788312, 1, '2022-08-19 09:41:03', NULL),
(4, 775346, 1, '2022-08-27 06:58:01', NULL),
(5, 651193, 1, '2022-09-02 15:11:53', NULL),
(6, 947011, 1, '2022-09-13 05:32:19', NULL),
(7, 477119, 1, '2022-09-13 11:06:10', NULL),
(8, 127224, 1, '2022-10-03 15:58:08', NULL),
(9, 101438, 1, '2022-10-04 06:59:14', NULL),
(10, 533421, 1, '2023-02-25 08:02:23', NULL),
(11, 520236, 1, '2023-03-02 11:47:05', NULL),
(12, 509146, 1, '2023-03-04 01:41:26', NULL),
(13, 733928, 1, '2023-03-04 06:52:51', NULL),
(14, 904138, 1, '2023-04-14 13:07:48', NULL),
(15, 163233, 1, '2023-04-17 00:54:44', NULL),
(16, 196597, 1, '2023-04-17 10:09:44', NULL),
(17, 257590, 1, '2023-05-24 14:37:36', NULL),
(18, 627322, 1, '2023-06-29 13:39:24', NULL),
(19, 462895, 1, '2023-06-30 10:06:48', NULL),
(20, 978022, 1, '2023-06-30 10:30:44', NULL),
(21, 397064, 1, '2023-08-26 14:48:42', NULL),
(22, 609385, 1, '2024-02-22 08:20:40', NULL),
(23, 884742, 0, '2024-04-11 18:10:22', NULL),
(24, 325810, 0, '2024-04-11 18:11:32', NULL),
(25, 845590, 0, '2024-04-11 18:11:48', NULL),
(26, 988502, 0, '2024-04-11 18:12:05', NULL),
(27, 163459, 0, '2024-04-11 18:14:26', NULL),
(28, 451235, 0, '2024-04-11 18:16:14', NULL),
(29, 481777, 0, '2024-04-11 18:17:09', NULL),
(30, 579459, 0, '2024-04-11 18:17:23', NULL),
(31, 193888, 0, '2024-04-11 18:17:40', NULL),
(32, 879123, 0, '2024-04-13 18:23:07', NULL),
(33, 466930, 0, '2024-04-13 18:24:58', NULL),
(34, 257413, 0, '2024-04-13 18:25:21', NULL),
(35, 813530, 0, '2024-04-13 18:27:55', NULL),
(36, 181552, 1, '2024-04-13 18:29:56', NULL),
(37, 384473, 1, '2024-04-13 18:31:12', NULL),
(38, 195968, 1, '2024-04-13 18:32:49', NULL),
(39, 202433, 1, '2024-04-13 18:34:21', NULL),
(40, 567007, 1, '2024-04-13 18:36:54', NULL),
(41, 387814, 1, '2024-04-13 18:50:51', NULL),
(42, 304565, 1, '2024-04-13 18:52:45', NULL),
(43, 550685, 1, '2024-04-13 18:54:29', NULL),
(44, 448244, 1, '2024-04-13 18:57:24', NULL),
(45, 455503, 1, '2024-04-13 19:07:43', 'chevlijay70@gmail.com'),
(46, 494920, 1, '2024-04-13 19:11:19', 'chevlijay70@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchased_mock_test`
--

CREATE TABLE `tbl_purchased_mock_test` (
  `cc_purchase_id` int(11) NOT NULL,
  `cc_user_id` int(11) DEFAULT NULL,
  `cc_exam_id` int(11) DEFAULT NULL,
  `cc_purchase_date_time` datetime DEFAULT NULL,
  `cc_payment_received` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_query`
--

CREATE TABLE `tbl_query` (
  `cc_query_id` int(11) NOT NULL,
  `cc_query_username` text NOT NULL,
  `cc_query_email` varchar(50) NOT NULL,
  `cc_query_description` varchar(5000) NOT NULL,
  `cc_query_ans` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_query`
--

INSERT INTO `tbl_query` (`cc_query_id`, `cc_query_username`, `cc_query_email`, `cc_query_description`, `cc_query_ans`) VALUES
(4, 'jay', 'chevlijay70@gmail.com', 'which is the best college for Cloud computing?', 'Amity is the best university for Cloud Computing.\r\nThank You!'),
(5, 'jay', 'chevlijay70@gmail.com', 'which the best college for bachelor of arts', 'MTB College which is under the VNSGU is the best for Bachelor of Arts.'),
(6, 'vijay', 'vijaymokariya4720@gmail.com', 'which is the best college for bba?', 'NMIMS'),
(7, 'Krishna', 'chevlijay70@gmail.com', 'Top BBA Institute?', 'http://localhost/netx/cc_project/course_details.php?courseid=1'),
(8, 'vaishnavi', 'vaishnavigheewala@gmail.com', 'what is the current trending courses?', 'mtech'),
(9, 'vaishnavi', 'vaishnavigheewala@gmail.com', 'what is the current trending courses?', 'Data Sciene,AI,ML are the most trending courses right now in IT.'),
(10, 'jay', 'chevlijay70@gmail.com', 'top college for data science', 'Loyola College'),
(11, 'jay', 'chevlijay70@gmail.com', 'Top level College for Btech', 'IIT Bombay'),
(12, 'jay', 'chevlijay70@gmail.com', 'top iim?', 'IIM Ahemdabad'),
(13, 'jay', 'chevlijay70@gmail.com', 'Top level IIM', 'Ahemdabad'),
(14, 'jay', 'chevlijay70@gmail.com', 'how DAIICT is?', NULL),
(15, 'Jay Chevli', 'chevlijay70@gmail.com', 'IIT Bombay ranking? ', 'nirf-3'),
(16, 'Jay Chevli', 'chevlijay70@gmail.com', 'IIT Bombay ranking? ', 'nirf ranking-3'),
(17, 'jay chevli', 'chevlijay70@gmail.com', 'how is DAIICT?', 'hii'),
(18, 'Jay Chevli', 'chevlijay70@gmail.com', 'how is MIT wpu? ', NULL),
(19, 'Jay Chevli', 'chevlijay70@gmail.com', 'Which are the top colleges for Msc in Gujarat', NULL),
(20, 'jay', 'chevlijay70@gmail.com', 'top iim?', 'iim ahemdabad,bombay'),
(21, 'Jay Chevli', 'chevlijay70@gmail.com', 'top iims', NULL),
(22, 'Jay Chevli', 'chevlijay70@gmail.com', 'helllo', NULL),
(23, 'Jay Query Testing', 'jconeseven@gmail.com', 'Testing!!!!', 'Working Good! Testing Successfull!');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `cc_user_id` int(11) NOT NULL,
  `cc_user_name` text NOT NULL,
  `cc_dob` date NOT NULL,
  `cc_email_id` varchar(150) NOT NULL,
  `cc_password` varchar(100) NOT NULL,
  `cc_mob_no` bigint(10) NOT NULL,
  `cc_gender` text NOT NULL,
  `cc_state_id` int(11) NOT NULL,
  `cc_city_id` int(11) DEFAULT NULL,
  `cc_pincode` int(6) NOT NULL,
  `cc_address` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`cc_user_id`, `cc_user_name`, `cc_dob`, `cc_email_id`, `cc_password`, `cc_mob_no`, `cc_gender`, `cc_state_id`, `cc_city_id`, `cc_pincode`, `cc_address`) VALUES
(3, 'Jay Chevli', '2002-06-27', 'chevlijay70@gmail.com', 'MTIzNDU2Nzg5amM=', 9265377672, 'Male', 1, 1, 395003, '4/4369, Chopara Street, Begampura'),
(4, 'Rajesh Patel', '2001-04-15', 'rajeshpatel20@gmail.com', 'MDAwMTExMjIybA==', 8264612810, 'Male', 2, 2, 356987, '4-3,prakash society'),
(5, 'jc oneseven', '2002-06-27', 'jconeseven@gmail.com', 'amNvbmVzZXZlbjE3', 8264612810, 'Male', 1, 1, 395003, '4/4369, chopara street, begampura'),
(6, 'Ratan Tata', '1984-02-01', 'ratantata07@gmail.com', '', 7895023641, 'Male', 10, 3, 658200, '3-4, tata mansion'),
(7, 'Vaishnavi Jariwala', '2003-03-31', 'vaishnavijari12@gmail.com', 'dmFpc2huYXZpamFyaTEy', 8563214790, 'Female', 1, 1, 395003, '4-33/mira soc., ghod-dod'),
(8, 'Mahendra Singh Dhoni', '1981-07-07', 'msdhoni@gmail.com', 'bXNkaG9uaTA3', 7854123564, 'Male', 2, 2, 834002, '9842+CJQ, Harmu Housing Colony, Delatoli, Ranchi, Jharkhand 834002'),
(9, 'Jay Chevli', '2018-07-02', 'chevlijay@gmail.com', 'MTIzNDU2Nzg5amM=', 9825566862, 'Male', 1, 1, 395003, '4/469'),
(10, 'axara ashish patel', '2004-06-03', 'axara@gmail.com', 'Nzg/PiwhQDM0NXZ2', 8745692100, 'Female', 10, 3, 395042, '4/21, rajraam apt., opp. rr mall,\r\nchennai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sector`
--

CREATE TABLE `tbl_sector` (
  `cc_sector_id` int(11) NOT NULL,
  `cc_sector_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sector`
--

INSERT INTO `tbl_sector` (`cc_sector_id`, `cc_sector_name`) VALUES
(1, 'Public'),
(2, 'Private');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `cc_state_id` int(11) NOT NULL,
  `cc_state_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`cc_state_id`, `cc_state_name`) VALUES
(1, 'Gujarat'),
(2, 'Maharashtra'),
(3, 'Punjab'),
(10, 'Tamil Nadu'),
(11, 'Karnataka'),
(12, 'Rajasthan'),
(13, 'MP'),
(14, 'UP'),
(15, 'Bihar'),
(17, 'Odisha'),
(18, 'Assam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test_questions`
--

CREATE TABLE `tbl_test_questions` (
  `cc_q_id` int(11) NOT NULL,
  `cc_exam_id` int(11) DEFAULT NULL,
  `cc_t_id` int(11) DEFAULT NULL,
  `cc_question` text DEFAULT NULL,
  `cc_option_a` varchar(255) DEFAULT NULL,
  `cc_option_b` varchar(255) DEFAULT NULL,
  `cc_option_c` varchar(255) DEFAULT NULL,
  `cc_option_d` varchar(255) DEFAULT NULL,
  `cc_correction_option` char(1) DEFAULT NULL,
  `cc_explanation` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test_result`
--

CREATE TABLE `tbl_test_result` (
  `cc_result_id` int(11) NOT NULL,
  `cc_exam_id` int(11) DEFAULT NULL,
  `cc_user_id` int(11) DEFAULT NULL,
  `cc_t_id` int(11) DEFAULT NULL,
  `cc_marks_obtained` int(11) DEFAULT NULL,
  `cc_total_marks` int(11) DEFAULT NULL,
  `cc_test_start_time` datetime DEFAULT NULL,
  `cc_test_end_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_register`
--

CREATE TABLE `tbl_user_register` (
  `cc_user_id` int(11) NOT NULL,
  `cc_google_id` varchar(250) DEFAULT NULL,
  `cc_user_name` text NOT NULL,
  `cc_email_id` varchar(50) NOT NULL,
  `cc_password` varchar(30) NOT NULL,
  `cc_profile_image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_register`
--

INSERT INTO `tbl_user_register` (`cc_user_id`, `cc_google_id`, `cc_user_name`, `cc_email_id`, `cc_password`, `cc_profile_image`) VALUES
(1, NULL, 'demo user', 'demo_user@gmail.com', 'MTIz', NULL),
(2, NULL, 'Jay DAIICT', '202312049@daiict.ac.in', 'MTIzNDU2Nzg5amM=', NULL),
(4, '110982210141490295749', 'Jay Chevli', 'chevlijay70@gmail.com', 'OTg3NjU0MzIxamM=', 'https://lh3.googleusercontent.com/a/ACg8ocJKNOXQ-BK3BMX-AzBFq41Vxma4VzxVyIHHEcoQxpBzJpRtS-m4=s96-c'),
(5, '110492966436738757249', '2023 12049', '202312049@daiict.ac.in', '', 'https://lh3.googleusercontent.com/a/ACg8ocIQBKtPwdQVcBO6SVI_CcvB5eT8G0CCH-ayriXlFUkieRSbvQ=s96-c'),
(8, NULL, 'Raj Mehta', 'raj@gmail.com', 'MTIzNDU2Nzg5amM=', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_alumni`
--
ALTER TABLE `tbl_alumni`
  ADD PRIMARY KEY (`alumni_id`),
  ADD KEY `dept_alumni` (`alumni_dept`),
  ADD KEY `degree_course_alumni` (`alumni_degree`),
  ADD KEY `alumni_email` (`alumni_email_id`),
  ADD KEY `institute_alumni` (`alumni_institute`);

--
-- Indexes for table `tbl_alumni_query`
--
ALTER TABLE `tbl_alumni_query`
  ADD PRIMARY KEY (`cc_query_id`),
  ADD KEY `alumni_query` (`cc_alumni_id`),
  ADD KEY `query_email` (`cc_query_email`);

--
-- Indexes for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  ADD PRIMARY KEY (`cc_cat_qstn_id`),
  ADD KEY `cc_opt_1_recommendation` (`cc_opt_1_recommendation`),
  ADD KEY `cc_opt_2_recommendation` (`cc_opt_2_recommendation`),
  ADD KEY `cc_opt_3_recommendation` (`cc_opt_3_recommendation`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`cc_city_id`),
  ADD KEY `stateid` (`cc_state_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`cc_course_id`),
  ADD KEY `dept` (`cc_dept_id`);

--
-- Indexes for table `tbl_dept`
--
ALTER TABLE `tbl_dept`
  ADD PRIMARY KEY (`cc_dept_id`);

--
-- Indexes for table `tbl_entrance_exam`
--
ALTER TABLE `tbl_entrance_exam`
  ADD PRIMARY KEY (`cc_exam_id`);

--
-- Indexes for table `tbl_institute`
--
ALTER TABLE `tbl_institute`
  ADD PRIMARY KEY (`cc_ins_id`),
  ADD KEY `sector` (`cc_ins_sector_id`),
  ADD KEY `sid` (`cc_state_id`),
  ADD KEY `cityid` (`cc_city_id`);

--
-- Indexes for table `tbl_ins_course`
--
ALTER TABLE `tbl_ins_course`
  ADD PRIMARY KEY (`cc_ins_course_id`),
  ADD KEY `course` (`cc_course_id`),
  ADD KEY `institute` (`cc_ins_id`);

--
-- Indexes for table `tbl_ins_exam`
--
ALTER TABLE `tbl_ins_exam`
  ADD PRIMARY KEY (`cc_ins_exam_id`),
  ADD KEY `insid` (`cc_ins_id`),
  ADD KEY `examid` (`cc_exam_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`cc_email_id`);

--
-- Indexes for table `tbl_otp1`
--
ALTER TABLE `tbl_otp1`
  ADD PRIMARY KEY (`otp_id`);

--
-- Indexes for table `tbl_purchased_mock_test`
--
ALTER TABLE `tbl_purchased_mock_test`
  ADD PRIMARY KEY (`cc_purchase_id`),
  ADD KEY `cc_user_id` (`cc_user_id`),
  ADD KEY `cc_exam_id` (`cc_exam_id`);

--
-- Indexes for table `tbl_query`
--
ALTER TABLE `tbl_query`
  ADD PRIMARY KEY (`cc_query_id`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`cc_user_id`),
  ADD UNIQUE KEY `emailid` (`cc_email_id`),
  ADD KEY `state_id` (`cc_state_id`),
  ADD KEY `city_id` (`cc_city_id`);

--
-- Indexes for table `tbl_sector`
--
ALTER TABLE `tbl_sector`
  ADD PRIMARY KEY (`cc_sector_id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`cc_state_id`);

--
-- Indexes for table `tbl_test_questions`
--
ALTER TABLE `tbl_test_questions`
  ADD PRIMARY KEY (`cc_q_id`),
  ADD KEY `cc_exam_id` (`cc_exam_id`);

--
-- Indexes for table `tbl_test_result`
--
ALTER TABLE `tbl_test_result`
  ADD PRIMARY KEY (`cc_result_id`),
  ADD KEY `cc_exam_id` (`cc_exam_id`),
  ADD KEY `cc_user_id` (`cc_user_id`);

--
-- Indexes for table `tbl_user_register`
--
ALTER TABLE `tbl_user_register`
  ADD PRIMARY KEY (`cc_user_id`),
  ADD KEY `user_email_id` (`cc_email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_alumni`
--
ALTER TABLE `tbl_alumni`
  MODIFY `alumni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_alumni_query`
--
ALTER TABLE `tbl_alumni_query`
  MODIFY `cc_query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  MODIFY `cc_cat_qstn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `cc_city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `cc_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_dept`
--
ALTER TABLE `tbl_dept`
  MODIFY `cc_dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_entrance_exam`
--
ALTER TABLE `tbl_entrance_exam`
  MODIFY `cc_exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_institute`
--
ALTER TABLE `tbl_institute`
  MODIFY `cc_ins_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_ins_course`
--
ALTER TABLE `tbl_ins_course`
  MODIFY `cc_ins_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_ins_exam`
--
ALTER TABLE `tbl_ins_exam`
  MODIFY `cc_ins_exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_otp1`
--
ALTER TABLE `tbl_otp1`
  MODIFY `otp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_purchased_mock_test`
--
ALTER TABLE `tbl_purchased_mock_test`
  MODIFY `cc_purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_query`
--
ALTER TABLE `tbl_query`
  MODIFY `cc_query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `cc_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_sector`
--
ALTER TABLE `tbl_sector`
  MODIFY `cc_sector_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `cc_state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_test_questions`
--
ALTER TABLE `tbl_test_questions`
  MODIFY `cc_q_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_test_result`
--
ALTER TABLE `tbl_test_result`
  MODIFY `cc_result_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_register`
--
ALTER TABLE `tbl_user_register`
  MODIFY `cc_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_alumni`
--
ALTER TABLE `tbl_alumni`
  ADD CONSTRAINT `alumni_email` FOREIGN KEY (`alumni_email_id`) REFERENCES `tbl_login` (`cc_email_id`),
  ADD CONSTRAINT `degree_course_alumni` FOREIGN KEY (`alumni_degree`) REFERENCES `tbl_course` (`cc_course_id`),
  ADD CONSTRAINT `dept_alumni` FOREIGN KEY (`alumni_dept`) REFERENCES `tbl_dept` (`cc_dept_id`),
  ADD CONSTRAINT `institute_alumni` FOREIGN KEY (`alumni_institute`) REFERENCES `tbl_institute` (`cc_ins_id`);

--
-- Constraints for table `tbl_alumni_query`
--
ALTER TABLE `tbl_alumni_query`
  ADD CONSTRAINT `alumni_query` FOREIGN KEY (`cc_alumni_id`) REFERENCES `tbl_alumni` (`alumni_id`),
  ADD CONSTRAINT `query_email` FOREIGN KEY (`cc_query_email`) REFERENCES `tbl_login` (`cc_email_id`);

--
-- Constraints for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  ADD CONSTRAINT `tbl_cat_ibfk_1` FOREIGN KEY (`cc_opt_1_recommendation`) REFERENCES `tbl_course` (`cc_course_id`),
  ADD CONSTRAINT `tbl_cat_ibfk_2` FOREIGN KEY (`cc_opt_2_recommendation`) REFERENCES `tbl_course` (`cc_course_id`),
  ADD CONSTRAINT `tbl_cat_ibfk_3` FOREIGN KEY (`cc_opt_3_recommendation`) REFERENCES `tbl_course` (`cc_course_id`);

--
-- Constraints for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD CONSTRAINT `stateid` FOREIGN KEY (`cc_state_id`) REFERENCES `tbl_state` (`cc_state_id`);

--
-- Constraints for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD CONSTRAINT `dept` FOREIGN KEY (`cc_dept_id`) REFERENCES `tbl_dept` (`cc_dept_id`);

--
-- Constraints for table `tbl_institute`
--
ALTER TABLE `tbl_institute`
  ADD CONSTRAINT `cityid` FOREIGN KEY (`cc_city_id`) REFERENCES `tbl_city` (`cc_city_id`),
  ADD CONSTRAINT `sector` FOREIGN KEY (`cc_ins_sector_id`) REFERENCES `tbl_sector` (`cc_sector_id`),
  ADD CONSTRAINT `sid` FOREIGN KEY (`cc_state_id`) REFERENCES `tbl_state` (`cc_state_id`);

--
-- Constraints for table `tbl_ins_course`
--
ALTER TABLE `tbl_ins_course`
  ADD CONSTRAINT `course` FOREIGN KEY (`cc_course_id`) REFERENCES `tbl_course` (`cc_course_id`),
  ADD CONSTRAINT `institute` FOREIGN KEY (`cc_ins_id`) REFERENCES `tbl_institute` (`cc_ins_id`);

--
-- Constraints for table `tbl_ins_exam`
--
ALTER TABLE `tbl_ins_exam`
  ADD CONSTRAINT `examid` FOREIGN KEY (`cc_exam_id`) REFERENCES `tbl_entrance_exam` (`cc_exam_id`),
  ADD CONSTRAINT `insid` FOREIGN KEY (`cc_ins_id`) REFERENCES `tbl_institute` (`cc_ins_id`);

--
-- Constraints for table `tbl_purchased_mock_test`
--
ALTER TABLE `tbl_purchased_mock_test`
  ADD CONSTRAINT `tbl_purchased_mock_test_ibfk_1` FOREIGN KEY (`cc_user_id`) REFERENCES `tbl_user_register` (`cc_user_id`),
  ADD CONSTRAINT `tbl_purchased_mock_test_ibfk_2` FOREIGN KEY (`cc_exam_id`) REFERENCES `tbl_entrance_exam` (`cc_exam_id`);

--
-- Constraints for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD CONSTRAINT `city_id` FOREIGN KEY (`cc_city_id`) REFERENCES `tbl_city` (`cc_city_id`),
  ADD CONSTRAINT `state_id` FOREIGN KEY (`cc_state_id`) REFERENCES `tbl_state` (`cc_state_id`);

--
-- Constraints for table `tbl_test_questions`
--
ALTER TABLE `tbl_test_questions`
  ADD CONSTRAINT `tbl_test_questions_ibfk_1` FOREIGN KEY (`cc_exam_id`) REFERENCES `tbl_entrance_exam` (`cc_exam_id`);

--
-- Constraints for table `tbl_test_result`
--
ALTER TABLE `tbl_test_result`
  ADD CONSTRAINT `tbl_test_result_ibfk_1` FOREIGN KEY (`cc_exam_id`) REFERENCES `tbl_entrance_exam` (`cc_exam_id`),
  ADD CONSTRAINT `tbl_test_result_ibfk_2` FOREIGN KEY (`cc_user_id`) REFERENCES `tbl_user_register` (`cc_user_id`);

--
-- Constraints for table `tbl_user_register`
--
ALTER TABLE `tbl_user_register`
  ADD CONSTRAINT `user_email_id` FOREIGN KEY (`cc_email_id`) REFERENCES `tbl_login` (`cc_email_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

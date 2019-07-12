-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2018 at 04:09 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_excercises`
--

CREATE TABLE `tbl_excercises` (
  `id` int(11) NOT NULL,
  `excercise_category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `time_length` time NOT NULL DEFAULT '00:00:00',
  `full_instructions` varchar(1000) NOT NULL,
  `profile_img` varchar(50) NOT NULL DEFAULT 'default_excercises.png',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_excercises`
--

INSERT INTO `tbl_excercises` (`id`, `excercise_category_id`, `name`, `time_length`, `full_instructions`, `profile_img`, `date_created`, `is_deleted`) VALUES
(1, 1, 'Hip Abduction Machine', '00:30:00', 'Hip Abduction Machine Overview\r\nThe hip abduction machine exercise is an exercise used to strengthen the abductors.\r\n\r\nThe abductors play a critical role in core stability and having strong abductors can result in better personal records on the squat and deadlift.\r\n\r\nFrom an aesthetic perspective, performing hip abduction isolation exercises assists in the development of a full pair of glutes and hips.\r\n\r\nHip Abduction Machine Instructions\r\nSetup in an upright position with your back against the pad and your spine neutral.\r\nExhale and push the legs apart as you open the pads.\r\nOnce your hips are fully externally rotated, slowly return to the starting position.\r\nRepeat for the desired number of repetitions.\r\nHip Abduction Machine Tips\r\nExperiment with foot and pelvis position. Depending upon the shape of your hip, you may need a slightly more internal or external starting position to fully maximize the contraction.\r\nSimilarly, be mindful of your pelvic position - don’t allow the back to', '1-1542706324.jpg', '2018-11-20 17:30:12', 0),
(2, 1, ' Cable Hip Abduction', '00:15:00', 'Cable Hip Abduction Instructions\r\nSet up for the cable hip abduction by attaching an ankle strap (if one is not available, a single handle may suffice) to the low pulley of a cable pulley machine and set your desired weight on the stack.\r\nAttach the ankle strap to your left ankle and stand up straight with your feet close together with your right foot closest to the machine. \r\nYou can use your right arm to hold onto the machine for stability. You are now in the staring position.\r\nBegin the movement by lifting your left leg straight out to your side as high as comfortably possible. This will lift the weight from the stack.\r\nPause for a moment and then slowly lower your leg back to the starting position. \r\nRepeat for the desired amount of reps. \r\nTurn around, attach the the strap to your right ankle and then repeat with your right leg.\r\n?Exercise Tips:\r\nStand up straight and focus on moving only at the hip. Keep your torso as still as possible.\r\nYou can eventually begin to increase the r', '2-1542706332.jpg', '2018-11-20 17:30:52', 0),
(3, 2, 'Lying Alternate Floor Leg Raise', '00:45:00', 'Lying Alternate Floor Leg Raise Instructions\r\nSet up for the lying floor leg raise by putting a mat on the floor and laying down on your back with your legs extended straight out and your arms by your side with palms on the floor.\r\nGet ready to start the set by lifting your heels off the floor slightly.\r\nKeeping your right leg straight out in front of you off the floor, raise your left leg slowly up to 90 degrees.\r\nSlowly lower your left leg back to the starting position without touching the floor and repeat the movement with your right leg.\r\n?Leg Raise Tips:\r\nKeep your feet off the floor for the entire set.\r\nDo not pause at the top of the movement. Keep movements slow and steady.', '3-1542706341.jpg', '2018-11-20 17:31:50', 0),
(4, 2, ' Twisting Floor Crunch', '00:30:00', 'Twisting Floor Crunch Instructions\r\nThe twisting floor crunch works the abs and obliques. Position a mat on the floor and lie down on the mat flat on your back.\r\nPull your left leg up until your knee joint is at around 90 degrees.\r\nNow take your right leg and rest your ankle on your left knee.\r\nStart the exercise by touching the side of your head with your fingertips and raising your shoulder blades slightly off the mat.\r\nCrunch up, bringing your left elbow up to your right knee.\r\nSlowly lower back to starting position without letting your shoulder blades touch the floor.\r\nRepeat set for the opposite side of the body.\r\n?Exercise Tips:\r\nNever let your shoulder blades touch the floor throughout the set.\r\nTry to bring your elbow up as high as possible using your abs only (no swinging!).', '4-1542707663.jpg', '2018-11-20 17:33:01', 0),
(5, 2, ' Lying Alternate Heel Touches', '00:20:00', 'Lying Alternate Heel Touches Instructions\r\nLay supine in a relaxed position with your knees up and arms straight out towards your feet.\r\nExhale hard and reach toward the base of your heel while contracting your abs and curling up.\r\nInhale as you slowly lower yourself back to the starting position and repeat on the opposite side.\r\nComplete for the assigned number of repetitions.\r\nLying Alternate Heel Touches Tips\r\nExhale hard like you’re blowing out candles on a cake and hold the contraction for a second in order to improve mind muscle connection.\r\nIf your lower back bothers you during this exercise, choose more anti extension and anti rotation based movements.', '5-1542706504.jpg', '2018-11-20 17:34:47', 0),
(6, 3, 'Lateral Kneeling Adductor Mobilization', '00:10:00', 'Lateral Kneeling Adductor Mobilization Overview\r\nThe lateral kneeling adductor mobilization drill is a form of dynamic stretching and an exercise used to alleviate tension in the adductors.\r\n\r\nEnsuring you’re properly warmed up is important for maximizing your time in the gym and avoiding injury.\r\n\r\nLateral Kneeling Adductor Mobilization Instructions\r\nIn an quadruped position, ensure the toes are tucked and the hands are directly underneath the shoulders.\r\nStraighten one leg to the side and keep the foot flat on the floor.\r\nExhale and push your hands into the floor to direct your hips backwards to increase the stretch on your groin.\r\nOnce you run out of range of motion in your adductor, rock back to the starting position and repeat for the assigned number of repetitions on both sides.\r\nLateral Kneeling Adductor Mobilization Tips\r\nIf you feel a pinch on the outside of the hip joint instead of a stretch on the inside portion (i.e. the adductor) then you may have adopted a stance is sligh', '6-1542706672.jpg', '2018-11-20 17:35:50', 0),
(7, 3, ' Rocking Frog Stretch', '00:20:00', 'Rocking Frog Stretch Overview\r\nThe rocking frog stretching drill is a form of dynamic stretching that warms up the muscles of the groin, upper back and shoulders.\r\n\r\nDynamic stretching is critical prior to performing your workouts as it allows you to activate your central nervous system and engage the muscle groups you’ll use later in your workout. Incorporating them into your warm up routine will help you get better results and avoid injury.\r\n\r\nRocking Frog Stretch Instructions\r\nIn a quadruped position, ensure the hands are underneath the shoulders, the knees are underneath the hips, and the toes are tucked.\r\nSpread the knees wide until you feel a stretch within your groin. From here, push your hands into the ground to drive your hips back and keep your chest upright.\r\nPush back until your hips run out of range of motion and then return to the starting position.\r\nRepeat for the desired number of repetitions.\r\nRocking Frog Stretch Tips\r\nFocus on keeping all of the movement relegated to', '7-1542706719.jpg', '2018-11-20 17:38:22', 0),
(8, 3, ' Adductor Foam Rolling', '01:00:00', 'Adductor Foam Rolling Overview\r\nFoam rolling your adductors is a great way to warm up and cool down for your workout, especially if you plan to perform lower body exercises that require the adductors to be more mobile.\r\n\r\nWhen you foam roll the adductors, or any muscle group for that matter, you alleviate some of the tension that is built up during the day and your workouts.\r\n\r\nAdductor Foam Rolling Instructions\r\nIn a prone position, place one leg straight and another at 90 degrees out to the side. Position the foam roller directly underneath the 90 degree leg on the inner thigh.\r\nSupport your upper body using your forearms and adjust pressure into the roller by applying more or less force through the forearms and foot.\r\nSlowly roll up and down the length of the adductor (groin) for 20-30 seconds.\r\nRepeat on the other side.\r\nAdductor Foam Rolling Tips\r\nThe most important thing you can remember with any soft tissue work: KEEP BREATHING. Don’t hold your breath, you want to release tensio', '8-1542706764.jpg', '2018-11-20 17:39:05', 0),
(9, 4, 'EZ Bar Curl', '00:45:00', 'EZ Bar Curl Instructions\r\nThe standing EZ bar curl is a variation of the barbell curl, but using an EZ bar. Grasp an EZ bar at around shoulder width apart using a underhand grip (palms facing up).\r\nStand straight up, feet together (you may be more comfortable taking one foot back for stability), back straight, and with your arms fully extended. The bar should not be touching your body.\r\nKeeping your eyes facing forwards, elbows tucked in at your sides, and your body completely still, slowly curl the bar up.\r\nSqueeze your biceps hard at the top of the movement, and then slowly lower it back to the starting position.\r\nRepeat for desired reps.\r\n?EZ Bar Curl Tips:\r\nUse the EZ bar curl when you have had wrist injuries or if you feel pain in the wrists when doing barbell curls.\r\nDo not swing back when you curl the bar up. This is cheating.\r\nKeep your body fixed and elbows in at your sides throughout the movement.', '9-1542706840.jpg', '2018-11-20 17:40:16', 0),
(10, 4, 'Standing Dumbbell Reverse Curl', '00:20:00', 'Standing Dumbbell Reverse Curl Instructions\r\nSelect the desired weight from the rack and assume a shoulder width stance.\r\nUsing a pronated (palms down) grip, take a deep breath and curl the dumbbells towards your shoulders.\r\nOnce the biceps are fully shortened, slowly lower the weight back to the starting position.\r\nRepeat for the desired number of repetitions.\r\nStanding Dumbbell Reverse Curl Tips\r\nDon’t allow the elbows to shift behind the body. Similarly, make sure the shoulder doesn’t shift forward in the socket as you lower the weight.\r\nMaintain a slight bend in the elbow at the bottom of the movement in order to keep tension through the biceps.\r\nRotate the forearms slowly, excessive velocity may cause issues within the elbows or wrists.\r\nUsing a slow eccentric (lowering portion) of the exercise can help to improve tension and mind muscle connection.', '10-1542706879.jpg', '2018-11-20 17:41:09', 0),
(11, 4, 'Cable Preacher Curl', '00:10:00', 'Cable Preacher Curl Instructions\r\nSet up for the cable preacher curl by grabbing a preacher bench and placing it in front of a low pulley cable machine. There should be about a 1-2 ft gap.\r\nAttach a straight bar to the low pulley cable and select the weight you want to use on the stack.\r\nSit on the bench with your upper arms on the pads and grasp the bar with an underhand grip (palms facing up) at about shoulder width.\r\nBend the arms slightly to apply tension to the biceps. This is the starting position.\r\nSlowly curl the bar up as far as possible, squeeze the biceps at the top, and then slowly lower the weight back to the starting position.\r\nRepeat for desired reps.\r\n?Exercise Tips:\r\nControl the weight during the set, especially on the way down.\r\nKeep your upper arms fixed on the pads, and don\'t lean back as you curl the weight up.\r\nKeep your wrists straight.', '11-1542707044.jpg', '2018-11-20 17:41:52', 0),
(12, 5, ' Standing Barbell Calf Raise', '00:05:00', 'Standing Barbell Calf Raise Instructions\r\nSet up for the standing barbell calf raise by getting a block or step and placing it in front of you.\r\nGrasp a barbell and place it across the back of your shoulders. Make sure the bar sits across the muscles in your upper back, not your neck.\r\nStand up on the block with the balls of your feet on the edge.\r\nKeeping your balance, raise your heels off the floor.\r\nSqueeze the calves, and then slowly lower your heals back down as far as possible without letting them touch the floor.\r\nRepeat for desired reps.\r\n?Calf Raise Tips:\r\nKeep the balls of your feet on the edge of the step. Don\'t let your feet come forward as this makes the exercise less challenging.\r\nKeep the rep timing slow and controlled - don\'t \"bounce\".\r\nTo help keep your balance, keep your eyes facing forward at all times.', '12-1542707117.jpg', '2018-11-20 17:43:48', 0),
(13, 5, 'Standing One Leg Calf Raise With Dumbbell', '01:20:00', 'Standing One Leg Calf Raise With Dumbbell Instructions\r\nThe 1 leg calf raise holding a dumbbell is a great exercise for working the calves at home without machines. Set up by grasping a dumbbell in your right hand and standing on the edge of a calf raise block or step with the balls of your feet on the edge.\r\nTake your right leg and hook it behind your left.\r\nLet your left heel drop as far as possible. This is the starting position.\r\nKeeping your body straight and eyes facing forwards, raise your left heel up as far as possible.\r\nPause and squeeze the calf muscle, and then slowly lower your heal back down as far as possible.\r\nRepeat for desired reps, and then repeat on the right leg.\r\nExercise Tips:\r\nAlways work your weakest side first. For most people this is the left.\r\nUse the maximum range of motion by pushing up as high as you can and letting your heel drop as far as possible.\r\nKeep the rep timing slow and control the weight on the way down.', '13-1542707179.jpg', '2018-11-20 17:46:11', 0),
(14, 5, '45 Degree Leg Press Calf Raise', '00:20:00', '45 Degree Leg Press Calf Raise Instructions\r\nLoad the machine with the desired weight and take a seat.\r\nSit down and position your feet on the sled with a shoulder width stance.\r\nTake a deep breath, extend your legs, but keep the safeties locked (if possible).\r\nPosition your feet at the base of the platform and allow the heels to hang off.\r\nLower the heels by dorsiflexing the ankles until the calves are fully stretched.\r\nDrive the weight back to the starting position by extending the ankles and flexing the calves.\r\nRepeat for the desired number of repetitions.\r\n45 Degree Leg Press Calf Raise Tips\r\nSAFETY NOTE: Be extremely careful when re-positioning the feet at the base of the platform. If the safeties are not in place and you lose control of the platform, this could result in very serious injury.\r\nKeep the repetitions slow and controlled. Limit momentum and pause at the top to emphasize the contraction.\r\nIf you experience any sort of pain or pressure in the back of the knee joint, ke', '14-1542707243.jpg', '2018-11-20 17:47:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_excercise_categories`
--

CREATE TABLE `tbl_excercise_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `profile_img` varchar(50) NOT NULL DEFAULT 'default_excercise_category.png',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_excercise_categories`
--

INSERT INTO `tbl_excercise_categories` (`id`, `name`, `description`, `profile_img`, `date_created`, `is_deleted`) VALUES
(1, 'Abductors', '', '1-1542706093.jpg', '2018-11-20 17:27:39', 0),
(2, 'Abs', '', '2-1542706099.jpg', '2018-11-20 17:27:46', 0),
(3, 'Adductors', '', '3-1542706104.jpg', '2018-11-20 17:27:55', 0),
(4, 'Biceps', '', '4-1542706110.jpg', '2018-11-20 17:28:00', 0),
(5, 'Calves', '', '5-1542706115.jpg', '2018-11-20 17:28:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exercise_user_logs`
--

CREATE TABLE `tbl_exercise_user_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `excercise_id` int(11) NOT NULL,
  `system_log` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_exercise_user_logs`
--

INSERT INTO `tbl_exercise_user_logs` (`id`, `user_id`, `excercise_id`, `system_log`, `date_created`, `is_deleted`) VALUES
(1, 2, 4, '', '2018-11-20 18:11:01', 0),
(2, 2, 5, '', '2018-11-20 18:11:08', 0),
(3, 2, 6, '', '2018-11-20 18:11:13', 0),
(4, 2, 7, '', '2018-11-21 02:12:15', 0),
(5, 2, 8, '', '2018-11-21 02:12:20', 0),
(6, 2, 9, '', '2018-11-21 02:12:28', 0),
(7, 1, 1, '', '2018-11-21 18:55:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exercise_week`
--

CREATE TABLE `tbl_exercise_week` (
  `id` int(11) NOT NULL,
  `day` int(11) NOT NULL DEFAULT '1',
  `exercise_id` int(11) NOT NULL,
  `time_start` time NOT NULL DEFAULT '09:00:00',
  `time_end` time NOT NULL DEFAULT '10:00:00',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_exercise_week`
--

INSERT INTO `tbl_exercise_week` (`id`, `day`, `exercise_id`, `time_start`, `time_end`, `date_created`, `is_deleted`) VALUES
(1, 2, 1, '07:00:00', '08:00:00', '2018-11-20 17:48:22', 0),
(2, 2, 3, '08:00:00', '09:00:00', '2018-11-20 17:48:34', 0),
(3, 2, 6, '10:00:00', '11:00:00', '2018-11-20 17:48:44', 0),
(4, 3, 2, '07:00:00', '08:00:00', '2018-11-20 17:49:01', 0),
(5, 3, 4, '08:00:00', '09:00:00', '2018-11-20 17:49:08', 0),
(6, 3, 7, '10:00:00', '11:00:00', '2018-11-20 17:49:16', 0),
(7, 4, 5, '07:00:00', '08:00:00', '2018-11-20 17:49:35', 0),
(8, 4, 8, '08:00:00', '09:00:00', '2018-11-20 17:49:49', 0),
(9, 4, 9, '10:00:00', '11:00:00', '2018-11-20 17:50:01', 0),
(10, 5, 10, '07:00:00', '08:00:00', '2018-11-20 17:50:48', 0),
(11, 5, 12, '08:00:00', '09:00:00', '2018-11-20 17:50:58', 0),
(12, 5, 1, '10:00:00', '11:00:00', '2018-11-20 17:51:12', 0),
(13, 6, 11, '07:00:00', '08:00:00', '2018-11-20 17:51:40', 0),
(14, 6, 14, '08:00:00', '09:00:00', '2018-11-20 17:51:48', 0),
(15, 6, 1, '10:00:00', '11:00:00', '2018-11-20 17:51:54', 0),
(16, 7, 1, '07:00:00', '08:00:00', '2018-11-20 17:52:29', 0),
(17, 7, 3, '08:00:00', '09:00:00', '2018-11-20 17:52:36', 0),
(18, 7, 6, '09:00:00', '10:00:00', '2018-11-20 17:52:45', 0),
(19, 7, 9, '10:00:00', '11:00:00', '2018-11-20 17:52:53', 0),
(20, 7, 12, '11:00:00', '12:00:00', '2018-11-20 17:53:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `isadmin` int(11) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL DEFAULT 'Undefined',
  `contact` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `age` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `weight` double(20,2) NOT NULL DEFAULT '0.00',
  `profile_img` varchar(50) NOT NULL DEFAULT 'default_user.png',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `username`, `password`, `isadmin`, `email`, `gender`, `contact`, `address`, `age`, `height`, `weight`, `profile_img`, `date_created`, `is_deleted`) VALUES
(1, '', 'admin', '202cb962ac59075b964b07152d234b70', 1, '', 'Undefined', '', '', 0, 0, 0.00, 'default_user.png', '2018-11-20 17:22:16', 0),
(2, 'Em podyi', 'ukininam', 'c65683edd4a13e4c43ff09dc1b0eecd5', 0, 'ukininam@gmail.com', 'Male', '09266666666', 'satubig, malinis street, oceanary', 20, 175, 44.00, '2xx1542737867.jpg', '2018-11-20 18:09:52', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_excercises`
--
ALTER TABLE `tbl_excercises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `excercise_category_id` (`excercise_category_id`);

--
-- Indexes for table `tbl_excercise_categories`
--
ALTER TABLE `tbl_excercise_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exercise_user_logs`
--
ALTER TABLE `tbl_exercise_user_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `excercise_id` (`excercise_id`);

--
-- Indexes for table `tbl_exercise_week`
--
ALTER TABLE `tbl_exercise_week`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exercise_id` (`exercise_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_excercises`
--
ALTER TABLE `tbl_excercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_excercise_categories`
--
ALTER TABLE `tbl_excercise_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_exercise_user_logs`
--
ALTER TABLE `tbl_exercise_user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_exercise_week`
--
ALTER TABLE `tbl_exercise_week`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_excercises`
--
ALTER TABLE `tbl_excercises`
  ADD CONSTRAINT `tbl_excercises_ibfk_1` FOREIGN KEY (`excercise_category_id`) REFERENCES `tbl_excercise_categories` (`id`);

--
-- Constraints for table `tbl_exercise_user_logs`
--
ALTER TABLE `tbl_exercise_user_logs`
  ADD CONSTRAINT `tbl_exercise_user_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_exercise_user_logs_ibfk_2` FOREIGN KEY (`excercise_id`) REFERENCES `tbl_excercises` (`id`);

--
-- Constraints for table `tbl_exercise_week`
--
ALTER TABLE `tbl_exercise_week`
  ADD CONSTRAINT `tbl_exercise_week_ibfk_1` FOREIGN KEY (`exercise_id`) REFERENCES `tbl_excercises` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

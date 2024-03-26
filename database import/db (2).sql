-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 03:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `username` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `password`) VALUES
('alvin', 'alvin@123'),
('basil', 'basil@123'),
('vivek', 'vivek@123');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hyperlink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `hyperlink`) VALUES
(1, 'Maruti Suzuki Swift', 'Swift/swift.php'),
(4, 'Maruti Suzuki Alto 800', 'Alto800/alto.php'),
(5, 'Maruti Suzuki WagonR', 'WagonR/wagonr.php'),
(6, 'Tata Punch', 'punch/punch.php'),
(7, 'Tata Tiago', 'tiago/tiago.php'),
(8, 'Tata Nexon', 'nexon/nexon.php'),
(9, 'Toyota Hycross', 'hycross/hycross.php'),
(10, 'Toyota Fortuner', 'fortuner/fortuner.php'),
(11, 'Toyota Glanza', 'glanza/glanza.php'),
(12, 'Hyundai Grand i10', 'i10/i10.php');

-- --------------------------------------------------------

--
-- Table structure for table `car_info`
--

CREATE TABLE `car_info` (
  `id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `fuel_type` varchar(50) NOT NULL,
  `engine_capacity` int(11) NOT NULL,
  `horsepower` int(11) NOT NULL,
  `torque` int(11) NOT NULL,
  `transmission` varchar(50) NOT NULL,
  `mileage` decimal(5,2) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `rating` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_info`
--

INSERT INTO `car_info` (`id`, `brand`, `model`, `price`, `fuel_type`, `engine_capacity`, `horsepower`, `torque`, `transmission`, `mileage`, `image_url`, `rating`) VALUES
(1, 'Maruti Suzuki', 'Wagon R', 1000000, 'Petrol', 1167, 69, 91, 'Manual', 20.50, 'wagonr.png', 4.3),
(2, 'Maruti Suzuki', 'Swift', 20000, 'Petrol', 1, 90, 120, 'Manual', 22.00, 'swift.png', 4.6),
(4, 'Tata', 'Tiago', 8000, 'Petrol', 1199, 84, 114, 'Manual', 23.84, 'tiago.png', 4.1),
(5, 'Toyota', 'Glanza', 800000, 'petrol', 1200, 110, 800, 'manual', 21.96, 'glanza.png', 4.8),
(6, 'Maruti Suzuki', 'Baleno', 15000, 'Petrol', 1200, 85, 110, 'Automatic', 23.87, 'baleno.png', 4.4),
(7, 'Hyundai', 'i20', 12000, 'Petrol', 1197, 83, 114, 'Manual', 20.25, 'i20.png', 4.2),
(8, 'Toyota', 'Fortuner', 35000, 'Diesel', 2755, 201, 500, 'Automatic', 12.90, 'fortuner.png', 4.9),
(9, 'Ford', 'Endeavor', 32000, 'Diesel', 1996, 168, 420, 'Automatic', 13.90, 'endeavour.png', 4.7),
(10, 'Toyota', 'Innova', 18000, 'Diesel', 2393, 147, 343, 'Manual', 15.10, 'innova.png', 4.5),
(11, 'Maruti Suzuki', 'Ignis', 11000, 'Petrol', 1197, 82, 113, 'Manual', 20.89, 'ignis.png', 4.2),
(12, 'Tata', 'Altroz', 12500, 'Petrol', 1199, 85, 113, 'Manual', 22.50, 'altroz.png', 4.4),
(13, 'Maruti Suzuki', 'Ertiga', 18000, 'Petrol', 1462, 103, 138, 'Automatic', 19.34, 'ertiga.jpeg', 4.6),
(14, 'Hyundai', 'Creta', 22000, 'Diesel', 1497, 113, 250, 'Automatic', 21.40, 'creta.jpeg', 4.8),
(15, 'Hyundai', 'Venue', 15000, 'Petrol', 998, 118, 171, 'Automatic', 17.52, 'venue.jpeg', 4.3),
(16, 'Kia', 'Seltos', 19000, 'Diesel', 1497, 113, 250, 'Automatic', 20.80, 'seltos.jpeg', 4.7),
(17, 'Kia', 'Sonnet', 21000, 'Petrol', 998, 118, 172, 'Automatic', 18.20, 'sonnetjpeg', 4.6);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `car_model` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `customer_name`, `car_model`, `rating`, `review`) VALUES
(1, 'sajiyettan', 'wagon-R', 0, 'good as expected'),
(7, 'BASIL BABU', 'CIVIC', 0, '2007 Blue Honda Civic: Plagued by frequent repairs, poor fuel economy, and an overall uncomfortable and disappointing driving experience.'),
(33, 'DQ', 'URUS', 3, 'COLOR FADE'),
(34, 'alvin', 'Maruti Suzuki Swift', 3, 'rggrrg'),
(35, 'alvin', 'Maruti Suzuki Swift', 3, 'rggrrg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `author`, `image_path`, `created_at`) VALUES
(13, '15 years of the Maruti-Suzuki Swift', 'Maruti Suzuki is celebrating 15 years since the launch of the Swift in India. The hatchback was introduced in the Indian market way back in 2005.\r\n\r\nIn the last 15 years, the Swift has gone through 3 generations. Maruti claims to have sold more than 2.2 million units of the car. The model is said to have led the premium hatchback segment for 14 years.\r\n\r\nThe third generation Swift was launched at the 2018 Auto Expo. According to Maruti, since its launch, the Swift has garnered close to 30% market share. It was the highest selling premium hatchback in FY2019-20.', 'a', 'uploads/swift.png', '2024-01-17 04:05:50'),
(14, 'Tata Tigor iCNG AMT Review', 'Tata Tigor iCNG AMT Pros\r\n\r\n• A well-calibrated CNG system that’s comfortable to drive\r\n• A CNG car with factory-backing, factory warranty & OEM standards of safety / quality\r\n• Mature on-road behaviour, including at highway speeds\r\n• CNG benefits like cheap running costs and lower CO2 emissions coupled with the convenience of an AMT\r\n• Usable boot space even with the CNG tanks\r\n• Great styling. A chic-looking compact sedan. Solid build too\r\n• Good-quality, nicely designed cabin\r\n• City-friendly nature: light controls, agreeable ergonomics & good driveability (in CNG too)\r\n• Available in the top variant, unlike other CNG models\r\n• Enjoyable Harman 8-speaker ICE. One of the better systems in this segment\r\n• Impressive kit (parking sensors, cooled glovebox, touchscreen ICE, auto headlamps & wipers...)\r\n• 4-star GNCAP safety rating is praiseworthy\r\n\r\nTata Tigor iCNG AMT Cons\r\n\r\n• Reduced power output is evident on the highway. CNG mode has lesser top-end performance\r\n• Many Indian cities & towns don’t have CNG pumps. The queue for CNG cars can be long in metro cities\r\n• Higher maintenance costs & upkeep (overall) in comparison with the regular petrol variant\r\n• When driven hard, the AMT can\'t match the smoothness & shift-times of a conventional automatic. Gets confused on climbs as well\r\n• AMT is not available in the XM variant\r\n• Dead pedal is not suitable for people with large feet\r\n• Focus on CNG driveability means that the FE numbers will take a bit of a hit\r\n• Firmer suspension & higher tyre psi rating means you feel more of the bad roads / potholes\r\n• A rare Tata car that cannot seat 5 (best for 4 adults)\r\n• All passengers need to get out of the vehicle while refilling CNG\r\n• Some missing features (full-size spare wheel, alloy wheels...)\r\n• Tata\'s after-sales service quality is a hit or miss. Remains a gamble\r\n\r\nTata Tigor iCNG AMT Review-2024_tata_tigor_cng_amt_exterior_06.jpg\r\n\r\nSince the Tata Tigor has already been reviewed by Team-BHP, this report will only focus on the 1.2L Petrol iCNG AMT model. To read the full official review, click here.\r\nTata Tigor iCNG AMT Review-2017tatatigor07.jpg\r\n\r\nIntroduction\r\n\r\nWhen we reviewed the Tata Tiago iCNG in 2022, the car was available with a manual transmission only. The same was the case with its sedan sibling, the Tigor iCNG. In a market where automatic transmissions are gaining popularity rapidly, selling a car with a manual gearbox only restricts its appeal.\r\n\r\nTo address this problem, Tata Motors has introduced an AMT version of the Tigor iCNG. This means that the car now offers the convenience of an automatic coupled with lower running costs of CNG. It is also the first CNG car in India with an \"automatic\" transmission.\r\n\r\nThe Tigor iCNG comes with a sequential CNG kit that features Tata\'s twin-cylinder setup for better space utilisation. This makes a big difference as it allows you to use some boot space that otherwise wouldn’t be possible. Powering the Tigor iCNG is the same 1.2-litre, 3-cylinder Revotron petrol engine as the Tiago iCNG. It makes 72 BHP and 95 Nm in CNG mode (vs 85 BHP and 113 Nm in petrol mode). The engine is mated to a 5-speed AMT. The Tigor iCNG also gets a retuned suspension setup to account for the added weight due to the tank at the rear and overall, it comes with all the pros and cons that are associated with a sequential CNG kit, all of which we will be discussing later in the review.\r\n\r\nTata Tigor iCNG AMT Price & Brochure\r\n\r\nThe Tigor iCNG AMT is being offered in 2 variants – XZA and XZA+. While the XZA is priced at Rs. 8,84,900 (ex-showroom), the XZA+ costs Rs. 9,54,900 (ex-showroom). If you do a variant-to-variant price comparison with the MT version, the AMT variants are approximately Rs. 60,000 more expensive. We would have liked to see the AMT make it to middle variants too.\r\n\r\nYou can download the Tata Tigor iCNG AMT brochure here - Tata Tigor iCNG Brochure.pdf\r\n\r\nGround Clearance\r\n\r\nTo bear the additional weight of the CNG tanks at the rear, Tata has retuned the suspension of the Tigor. The Tigor CNG’s unladen ground clearance is rated at 165 mm which is 5 mm less than the petrol variant.\r\n\r\nStandard & Extended Warranty\r\n\r\nThe Tigor iCNG AMT is being offered with a 3-year or 1,00,000 km warranty. Extended warranty for the fourth and fifth year can be purchased. As always, we recommend you opt for the maximum extended warranty for additional peace of mind.\r\n\r\nSafety\r\n\r\nThe Tigor is known for its 4-star GNCAP safety rating. The top variant is equipped with safety features such as dual airbags, ISOFIX, ABS + EBD, Cornering Stability Control, reverse parking sensors, ISOFIX child seat anchors, 3-point seatbelts (all seats), seatbelt reminders (all seats), reversing camera, automatic headlamps & wipers and TPMS.\r\n\r\nApart from these, there are a few CNG-specific safety features like the use of high-quality stainless steel tubes and fittings to prevent any leaks. They’re also rust and corrosion-resistant and have been tested across temperatures and pressures. In the case of an accident, the CNG fuel is automatically cut off and the remaining gas from the tubes is released directly into the atmosphere through a special nozzle. The car also switches to petrol automatically if a leak is detected in the system.\r\n\r\nThe twin CNG cylinders are placed below the luggage area in the boot as the valve and pipes are protected under the boot floor. This reduces the risk of damage.\r\n\r\nThe Tigor CNG is fitted with a micro switch inside the fuel lid. This is an additional safety feature that turns off the engine as soon as the fuel lid is opened. The switch will also not allow the engine to be cranked until the lid is closed. There’s also a fire extinguisher placed under the driver\'s seat.', 'a', NULL, '2024-02-25 18:23:26'),
(15, '2024 Kia Sonet Facelift Review', 'Introduction\r\n\r\nThe sub-4m crossover (C1) segment has some of the best-selling cars in India. Cars like the Maruti Brezza & Fronx, Hyundai Exter & Venue and Tata Nexon & Punch are the strongest players in the segment. Kia\'s offering in this segment is the Sonet, which was introduced in 2020. It has been a consistent performer and with the 2024 facelift, Kia has made it more appealing by adding many new features to it.\r\n\r\nThis is the first facelift that the Sonet has received since its launch in 2020. But then, it was always a mechanically sound car with lots of engine & transmission options and loaded with features. The latest updates keep it up-to-date and attractive for customers. Among the updates are some cosmetic changes and feature additions, the most significant being ADAS Level 1.\r\n\r\nAs before, the Sonet comes with 3 engine options – an 82 BHP, 1.2-litre naturally aspirated petrol, a 118 BHP, 1.0-litre turbo-petrol and a 114 BHP, 1.5-litre turbo-diesel. You get a 5-speed manual transmission with the 1.2 NA petrol engine. The 1.0 turbo-petrol can be had with a 6-speed iMT or a 7-speed DCT automatic. Lastly, the 1.5 diesel engine gets a 6-speed MT, 6-speed iMT and a 6-speed torque converter automatic. In total, there are 3 engine options, 3 types of manual transmissions, and 2 types of automatic gearboxes on offer. The car is available in 7 variants, 8 monotone body colours, 2 dual-tone colours, 1 matte finish colour, 5 interior themes, and 4 wheel designs.\r\n\r\nKia Sonet Price & Brochure\r\n\r\nPrices of the different variants of the 2024 Kia Sonet Facelift will be announced later this month.\r\n\r\nYou can download the Kia Sonet brochure here - 2024 Kia Sonet Brochure.pdf', 'a', 'uploads/sonet.jpg', '2024-02-25 18:24:10'),
(16, 'MG Astor: First Drive Review', 'MG Astor Review Synopsis:\r\nMG Astor is now on sale in India for an introductory price between Rs.9.78 – 16.78 Lakh (Ex.Showroom).\r\nIt’s available in four variants: Style, Super, Smart, Sharp and two Petrol engine options: VTi-Tech & 220-Turbo.\r\nThe 1.5L VTi-Tech delivers power of 110 PS, 144 Nm torque and available with choice of 5-Speed manual gearbox or CVT.\r\nMore powerful 1.3L Turbo unit produces 140 PS and 220 Nm torque. However, it’s only available in 6-Speed automatic transmission.\r\nHigh-tech features such as Advanced Driver Assistance Systems (ADAS) as well as intuitive Artificial Intelligence interface are some of the major highlights of Astor.\r\nExterior colors options: Spiced Orange, Aurora Silver, Glaze Red, Candy White & Starry Black. The interiors shades include: Tuxedo Black, Dual Tone Iconic Ivory & Sangria Red.\r\nWhile certain established brands in India are struggling to survive in the challenging market conditions, one can’t overlook the fact that there are some relatively new names which have managed to swiftly capture the attention of Indian market in a rather little time-span. Morris Garages (MG) is one of them. The brand itself is British-origin but now a wholly-owned subsidiary of Chinese-major SAIC Motor. So that’s where its models come from, regardless of the fact that they’re still marketed as British. MG Astor will be the fourth vehicle in company’s currently all-SUV portfolio in India. It’s a Mid-Size crossover SUV that’s aimed against the likes of Hyundai Creta, newly-launched Skoda Kushaq, Volkswagen Taigun and more. For now, Astor will be available only in Petrol variants. With several bells & whistles onboard, if given the right price-tag, it might as well turn out to be the segment’s next breakthrough product.\r\n\r\nLooks & Design\r\n\r\nMG-Astor-Side-View.JPG​\r\n\r\nEssentially, MG Astor is the gasoline counterpart of ZS EV that’s already on sale in India. However, one wouldn’t have to look too closely to distinguish between both the models. MG Astor receives charmingly redesigned Full-LED Hawk-eye headlamps, which resonate more with Gloster’s in terms of “family-design” philosophy. Front bumper too has gone under the knife to become sportier with facets such as a recessed foglamp housing. The large and bold front celestial grille undisputedly is the most attractive front design element of the car. Likewise, primary changes on the rear design are refreshed taillamps and bumper with sporty artificial air-vents and unconcealed chrome-accentuated dual exhaust tips. I recently compared how ZS EV’s rear (especially taillamps) look alike to first-gen Hyundai Creta (Link). If that’s the case, it wouldn’t be wrong to compare Astor’s taillamps to first-gen Hyundai Creta facelift, albeit more good-looking.\r\n\r\nLike we’ve seen in Volkswagen cars, the rear “MG” logo is flip-type and doubles up to lift the boot. Just below it is the stylized “Astor” lettering that doesn’t at all look odd and aftermarket as in Gloster. MG has decided to retain “ZS” badge, the original name of model while “ADAS” badge on the right ensure that all the major tech-features of the car receive due attention. It’s on the side-view that has a minimal difference, except for the reshuffling of badges. A classy “Brit Dynamic” with Union Jack emblem trades places with “Electric” badge, while “AI Inside” marking on driver’s door flaunts Astor’s one of the major potential USPs. On a related note, “AI Inside” surely doesn’t sound cheap unlike “Internet Inside” markings on other models. The silver side door beading on ZS EV has been transformed into gloss black on Astor, making it virtually unnoticeable as it merges with the lower-end cladding. Adding some oomph to the side-view are turbine inspired 17” machined alloys, wearing Continental Ultra Contact UC6 rubber with 215/55 R17 V-rated profile. Spare wheel, though, is a 215/60 R16 steel unit. Dimensions-wise, MG Astor is longer (2323 mm), wider (1809 mm) as well as taller (1650 mm) than the European and Korean twins, but it falls short of wheelbase (2585 mm) in comparison to Creta’s 2610 mm and Taigun’s 2651 mm.\r\nInteriors, Features & Comfort\r\n\r\nMG-Astor-Dashboard.JPG​\r\n\r\nThe interior layout inspite of being similar to ZS EV is much diverse and invokes an energetic vibe. Its color combination is what MG labels “Sangria Red” and it matches well with our test car in Glaze Red exterior shade. The dashboard from ZS looks modern already. It’s the premium bits like leather-stitched upholstery, 25.7-cm HD touchscreen, full-panoramic sunroof etc. that further enhance its appeal at first glance. There is also a plethora of technological advancements incorporated in the car. Most intuitive, first-in-segment and up-with-time being the “Personal AI Assistant” that sits right on top center of dashboard. This smiley-faced device is an interesting inclusion that is likely to ensure you’re never bored on long road-trips. Upon getting inside the Astor, it revolves across from left to right, and waves a virtual “namaste” gesture to all. During the trip (when not interacted), its “virtual eyes” blink once in a while. This AI bot can perform several actions such crack a joke, share news, answer general-knowledge queries, control certain features, chit-chat (with understanding of 35+ Hinglish commands) and even greet on our local festivals.\r\n\r\nThe 25.7-cm HD touchscreen at the center of dash also has abundant functionalities to keep one busy. MG Astor has over 80 connected car features combining hardware, software, services and applications to ease the driving experience. Digital-key is one that’ll always come handy. It’s a mobile-app based authenticator to lock or lock the car and turn the engine on or off. Do note that it’s an “authenticator” only and not a key in itself unlike in some high-end cars. You can also make use of i-Smart app to control music, air-conditioner amongst other functionalities. Morris Garages has partnered with service-providers such as Jio (embedded SIM for internet and JioSaavn app for entertainment), MapMyIndia (for GPS-navigation), Park+ (search and reserve parking-space on the move), and Koinearth (earn safe-driving behavior rewards in the form of lower-insurance premium or higher resale value of car).\r\n\r\nMG-Astor-Front-Seats.JPG​\r\n\r\nThe driver’s seat is 6-way electrically-adjustable but it doesn’t offer an option for lumbar support, while co-driver has to manually manage seat adjustments. Front seats are large, bucket-type and sufficiently comfortable. I’m 5.11” and would’ve preferred a tad more under-thigh support though. Front arm-rest isn’t slide-able either. The view from cockpit is clean, with unobtrusive A-Pillars and well-positioned dashboard. The dash-top is made up of soft-touch plastics, but on the contrary, the stitched Sangria-red art-leather isn’t as soft-touch as one is likely to expect. Plastic quality on doors and elsewhere is mediocre, not the best. Front cabin is equipped with enough cubby-holes to do the job, including the ones on door’s armrest, if you count those. There’s space ahead of gear-lever to keep cell-phone, apart from dual cup-holders and under front armrest stowage. Front door pockets don’t have too much space left, but for snack-packs, after keeping a one-liter bottle. Similarly, glovebox has limited capacity by nature of its design and is ideal for documents.\r\n\r\nMG Astor has 5 USB charging ports and single 12V socket. Two USBs at front and two at rear, but it’s the location of fifth port that’s unique for the segment and a good example of how little attention to detail can make a big difference. It’s straight-above the inside rear-view mirror, making installation of dash-cam only a matter on plug-and-play. Many informed TAI-gers already have a dashcam in their car and such feature will further promote its use toward safe-driving. [thumbsup]. The rear seat is ISOFIX compatible and splits into 60:40 for convenience. There aren’t many storage spaces at rear, unlike front, apart from small door pockets and rear-center armrest cup-holders. The rear cabin itself is spacious and a large amount of credit for enhancing this sense of roominess goes to panoramic sunroof; cabin doesn’t feel claustrophobic at all when in MG Astor sunroof is closed along with its shade. The rear bench is generous for two adults. There are three separate headrests but I suspect if the 3rd-passenger will feel comfortable for too long, thanks to carboard hard backrest (middle-armrest area). Elevated hump on floor doesn’t help either. Seat three healthy adults abreast and there might be a struggle for shoulder room as well. However, legroom isn’t a major concern, nor is the headroom even for tall occupants but as in front, I’d have preferred more under-thigh support.\r\n\r\n\r\nPerformance, Braking, Ride & Handling:\r\n\r\nMG-Astor-Engine-Bay.JPG​\r\n\r\nUnder the hood is the place where almost all similarities between MG Astor and ZS EV come to an end. Powering the Astor will only be an option of two Petrol engines. Diesel motor is ruled out atleast for now. First engine option is the “VTi-Tech” (1498 CC) that delivers power of 110 PS @ 6000 RPM and 144 Nm torque @ 4400 RPM. It’ll be available with a selection of 5-speed manual transmission or CVT (automatic). Second option is the more powerful turbocharged “220-Turbo” (1349 CC), offering 140 PS @ 5600 RPM and 220 Nm @ 3600 RPM. This one will only have a 6-speed automatic transmission (sans pedal-shifters). Both engine variants have different fuel tank capacities too. Former is 48-liters while latter has 45-liters.\r\n\r\nThe gadget-laden list of infotainment features was only the beginning. Astor further utilizes the support of automotive technological advancements to assist seamless driving experience. Advanced Driver Assistance System (ADAS) is Level-2 of vehicle autonomy. The purpose of features under this group is to help minimize human error in driving rather than to be relied upon exclusively. There are 14 autonomous driving functions in this vehicle, a few of which are described below. We checked most of them first-hand.\r\nLane Assist System: It has 3-modes which work only at 60+ Kmph. LDW (Lane-Departure Warning). LDP (Lane Departure Prevention) and LKA (Lane Keep Assist). The camera in front tracks lanes-markings and warns if deviation is detected. LKA includes both LDW & LDP features and it will override driver’s control from steering wheel to correct the course. This system does not work on unmarked roads.\r\nRear Drive Assist: It includes Blindspot Detection, Lane-Change Assist along with Rear-Cross Traffic Alert. This comes handy during everyday driving to detect obstacles which otherwise have a possibility of getting missed. At 30+ Kmph, upon attempting lane-change (with indicator on), the system will trigger an alert by beeping and flashing the icon on ORVM to alert about approaching high-speed vehicle. Similarly, warning is shown on reverse camera once the reverse gear is engaged.\r\nForward Collision Prevention: It incorporates Forward Collison Warning + Automatic Emergency Braking. The car detects and warns beforehand about a probable front collision (including that with a pedestrian). If still no action is taken, it automatically applies brakes. There are individual settings to adjust sensitivity and whether to auto-apply brakes or only show an alert.\r\nAdaptive Cruise Control: Probably most of us have already heard of this feature. As the name indicates, it’s an “adaptive” version of standard Cruise Control. The system monitors the road ahead and accelerates or decelerates to maintain an adequate distance from the vehicle in front at all times.\r\nIntelligent Headlamp Control: A simple but enormously important feature in India for road-safety. Based on factors such as on-coming traffic, it enables or disables high-beam to prevent blinding the road users.\r\nSpeed Assist System: Yet another handy feature for both, sedate drivers to prevent accidental overspeed and for rash drivers to force their speed within legal limits. There are 3 modes. Speed Warning, Intelligent and Manual. The first reads speed limit signboards from road and alerts the driver of probable violation. Second will warn as well as force the vehicle to remain in zone’s designated speed limit. Third allows to set limit as per own choice. You can also fully turn off this feature but remember, government-imposed warnings at 80 Kmph and 120 Kmph will still sound.\r\n\r\nMG-Astor-Gearlever.JPG​\r\n\r\nOur test car was equipped with Turbo Petrol engine and we had a limited run that too on a flat-tarmac of Buddh International Circuit. So, a conclusive opinion on the overall performance won’t be fair. However, what’s obvious from the initial impression is that Morris Garages has tuned the Astor more for the laid-back drivers rather than for the enthusiasts. Push the accelerator hurriedly in D-mode and it’ll take its own sweet time to respond. The SUV in itself is relatively quick but don’t expect an enthusiastic performance. Situation although becomes somewhat better in S-Mode where upshifts happen at around 4,000 RPM.\r\n\r\nSteering wheel has three modes to offer: Dynamic, Urban and Normal. In the Dynamic mode, it weighs up nicely for high-speed cornering. Urban mode, on the other hand, is dead-light and most suitable for maneuvering in congested locations. For routine city-usage, I’d rather prefer to end up with the “Normal” mode. The curves of BIC provided ample opportunity to corner at high-speeds and the MG Astor scores well as far as stability and control is concerned, but it’s the perceptible body-roll that might become a spoilsport. We couldn’t check how this crossover performs over bad-roads but it comfortably passed over speed-breakers and the ride felt planted enough at high-speed driving. NVH from this 3-cylinder motor on idle is evident but overall, acceptable. Thanks to all-four discs, braking is sharp and confidence inspiring. MG has stuffed in plenty of safety features (49 to be precise), leaving no scope for nit-pick. Some of them include: Six airbags, ABS, EBD, Brake Assist, Electronic Stability Program, Traction Control, Hill Hold, Hill Descent (first-in-segment) etc. All said and done, what’s confirmed is that MG Astor is here to up the game of segment considering the amount of technological-features it incorporates in a handsome-looking, attractive and practical package. However, best of all, despite of its deep-rooted Chinese origin, Astor neither looks like one nor feels like one.', 'a', 'uploads/astor.jpg', '2024-02-25 18:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `sold_cars`
--

CREATE TABLE `sold_cars` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `description` text NOT NULL,
  `contact` int(10) NOT NULL,
  `seller_username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sold_cars`
--

INSERT INTO `sold_cars` (`id`, `title`, `images`, `price`, `description`, `contact`, `seller_username`) VALUES
(0, 'Maruti Suzuki Baleno', 'uploads/baleno.png', 9, 'srthbvcxdrtyuikmn', 2147483647, 'a'),
(21, 'Tata Tiago', 'uploads/tiago.png', 7, 'mint condition', 2147483647, 'a'),
(26, 'Tata Harrier', 'uploads/PngItem_1751214.png', 1700000, 'Neat', 2147483647, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `testdrive`
--

CREATE TABLE `testdrive` (
  `id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testdrive`
--

INSERT INTO `testdrive` (`id`, `brand`, `model`, `name`, `contact`, `date`, `time`) VALUES
(1, 'Suzuki', 'Swift', 'Alvin Siju', '8921543789', '2024-02-28', '15:59:00'),
(2, 'Suzuki', 'Swift', 'Alvin Siju', '8921543789', '2024-02-28', '15:59:00'),
(3, 'Suzuki', 'Swift', 'Alvin Siju', '8921543789', '2024-02-28', '15:59:00'),
(4, 'Suzuki', 'Swift', 'Alvin Siju', '8921543789', '2024-02-28', '15:59:00'),
(5, 'Suzuki', 'Swift', 'Alvin Siju', '8921543789', '2024-02-28', '15:59:00'),
(6, 'Suzuki', 'Swift', 'Alvin Siju', '8921543789', '2024-02-28', '15:59:00'),
(7, '', '', 'Alvin Siju', '8921543789', '2024-02-08', '15:17:00'),
(8, '', '', 'a', '11', '2024-03-06', '17:19:00'),
(9, '', '', 'b', '8921543789', '2024-02-20', '15:21:00'),
(10, 'Maruti Suzuki', 'Wagon R', 'a', '11', '2024-02-07', '19:24:00'),
(11, '', '', 'a', '8921543789', '2024-02-06', '16:30:00'),
(12, 'Maruti Suzuki', 'Wagon R', 'a', '8921543789', '2024-02-13', '19:09:00'),
(13, 'Maruti Suzuki', 'Wagon R', 'Alvin Siju', 'sdf', '2024-02-12', '19:10:00'),
(14, '', '', 'a', '11', '2024-02-27', '19:10:00'),
(15, '', '', 'b', '8921543789', '2024-02-06', '18:15:00'),
(16, 'Toyota', 'Fortuner', 'a', '11', '2024-02-07', '16:45:00'),
(17, 'Tata', 'Tiago', 'vivek', '53747837348', '2024-02-20', '16:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `used_cars`
--

CREATE TABLE `used_cars` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `description` text NOT NULL,
  `contact` int(10) NOT NULL,
  `seller_username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `used_cars`
--

INSERT INTO `used_cars` (`id`, `title`, `images`, `price`, `description`, `contact`, `seller_username`) VALUES
(22, 'Tata Nexon', 'uploads/nexon.png', 11, 'Well Kept Single Owner. Price Slightly Negotiable', 2147483647, 'a'),
(23, 'Toyota Fortuner', 'uploads/fortuner.png', 1800000, 'well maintained and owned by a doctor', 2147483647, 'a'),
(25, 'Maruti Suzuki WagonR', 'uploads/wagonr.png', 80000, 'Well Kept. Doctor owned. ', 2147483647, 'b');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`) VALUES
('a', 'a@gmail.comc', 'a'),
('b', 'b@gmail.com', 'b'),
('basil', 'basil004@gmail.com', '123354'),
('c', 'c@gmail.com', 'c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_info`
--
ALTER TABLE `car_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sold_cars`
--
ALTER TABLE `sold_cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testdrive`
--
ALTER TABLE `testdrive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `used_cars`
--
ALTER TABLE `used_cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_seller_username` (`seller_username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `car_info`
--
ALTER TABLE `car_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `testdrive`
--
ALTER TABLE `testdrive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `used_cars`
--
ALTER TABLE `used_cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `used_cars`
--
ALTER TABLE `used_cars`
  ADD CONSTRAINT `fk_seller_username` FOREIGN KEY (`seller_username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

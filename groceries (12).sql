-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 04:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `groceries`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(10) NOT NULL,
  `product_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `product_id`, `id`, `quantity`) VALUES
(178, 78, 172, 1),
(179, 79, 172, 4),
(180, 85, 172, 1),
(181, 83, 172, 1);

-- --------------------------------------------------------

--
-- Table structure for table `listname`
--

CREATE TABLE `listname` (
  `ListID` int(10) NOT NULL,
  `ListName` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listname`
--

INSERT INTO `listname` (`ListID`, `ListName`, `id`) VALUES
(108, 'wedding', 172),
(109, 'sister wedding', 172);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_name` text NOT NULL,
  `sale` varchar(255) NOT NULL,
  `percentage` varchar(255) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_quantity` int(10) NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `p_cat_id`, `date`, `product_name`, `sale`, `percentage`, `product_price`, `product_img`, `product_quantity`, `product_desc`) VALUES
(14, 5, '2021-06-18 13:41:36', 'Dutch Lady Full Cream Milk', '2', '', 8.00, 'dutch-lady-full-cream-milk.png', 35, '<p style=\"text-align: justify;\">Over 140 years of dairy farming heritage, Dutch Lady brings you quality milk from pure farm. It is delicious and full of essential nutrients that are indispensable for your day. Dutch Lady Fresh Milk nourishes you with the goodness and nutrition directly from nature!</p>'),
(15, 5, '2021-05-22 06:37:53', 'F&N Fruitade', '1', '50', 4.00, 'f&n-fruitade.jpg', 35, '<p style=\"text-align: justify;\">Bold, vibrant, and flavour-packed, F&amp;N carbonated fruit flavoured drink never fails to add a pop of colour and energy to any occasion.&nbsp;</p>'),
(16, 5, '2021-05-22 06:38:52', 'F&N Groovy Grape', '1', '3', 4.00, 'f&n-groovy-grape.jpg', 35, '<p style=\"text-align: justify;\">Bold, vibrant, and flavour-packed, F&amp;N carbonated fruit flavoured drink never fails to add a pop of colour and energy to any occasion.&nbsp;</p>'),
(17, 5, '2021-05-22 06:39:55', 'F&N Ice Cream Soda', '1', '4', 4.00, 'f&n-ice-cream-soda.png', 35, '<p style=\"text-align: justify;\">Bold, vibrant, and flavour-packed, F&amp;N carbonated fruit flavoured drink never fails to add a pop of colour and energy to any occasion.&nbsp;</p>'),
(18, 5, '2021-05-22 06:40:24', 'F&N Sarsi', '1', '4', 4.00, 'f&n-sarsi.jpg', 35, '<p style=\"text-align: justify;\"><span style=\"text-align: justify;\">Bold, vibrant, and flavour-packed, F&amp;N carbonated fruit flavoured drink never fails to add a pop of colour and energy to any occasion.&nbsp;</span></p>'),
(19, 5, '2021-05-22 06:42:07', 'F&N Seasons Ice Apple Tea', '1', '5', 2.00, 'f&n-seasons-ice-apple-tea.jpg', 100, '<p style=\"text-align: justify;\">F&amp;N SEASONS derives goodness from natural ingredients to encourage well-being. This Ice Apple Tea is packed with fruity zest of sweet sour peach, naturally brewed from pure tea extracts. It is rich in antioxidant and free from artificial colouring or preservatives.</p>'),
(20, 5, '2021-05-22 06:43:09', 'F&N Zapple', '1', '4', 4.00, 'f&n-zapple.jpg', 35, '<p style=\"text-align: justify;\">Bold, vibrant, and flavour-packed, F&amp;N carbonated fruit flavoured drink never fails to add a pop of colour and energy to any occasion.&nbsp;</p>'),
(21, 5, '2021-05-22 06:44:00', 'Fernleaf Full Cream', '1', '3', 16.00, 'fernleaf-full-cream.png', 100, '<p style=\"text-align: justify;\">Fernleaf Instant Milk Powder is a milk which your family will enjoy. It is made from the natural goodness of New Zealand. The wholesome nutrition goodness is preserved through our advanced technology developed by Fernleaf Institute.</p>'),
(22, 5, '2021-05-22 06:45:14', 'Goodday Kurma Flavoured Milk', '1', '2', 9.00, 'goodday-kurma-flavoured-milk.jpeg', 100, '<p style=\"text-align: justify;\">You can now enjoy the goodness of dates and fresh milk with? Goodday Kurma Milk! Formulated using real kurma extract, it has a delicious taste and it also contains various benefits that are good for your body. Try it out today!</p>'),
(23, 5, '2021-05-22 06:46:38', 'Horlicks', '1', '2', 25.00, 'horlicks.jpg', 50, '<p style=\"text-align: justify;\">Horlicks Original Malted Drink is made from the natural goodness of malted barley, wheat and milk with no artificial flavours, sweeteners or preservatives. It contains the vitamins, minerals, macronutrients and fibre to keep you and your family nourished every day.</p>'),
(24, 5, '2021-05-22 06:47:28', 'Ice Mountain Mineral Water', '1', '2', 1.00, 'ice-mountain.jpg', 150, '<p style=\"text-align: justify;\">F&amp;N Ice Mountain Natural Mineral Water is a natural sourced mineral water that refreshes and hydrates you with the quality and purity of 100 metre-deep natural water. Contains various beneficial minerals such as calcium, potassium, and magnesium, F&amp;N Ice Mountain provides you the nature&rsquo;s way of restoring balance and refreshment for your essential daily hydration.</p>'),
(25, 5, '2021-05-22 06:48:34', 'Nescafe Latter', '1', '2', 2.00, 'nescafe-latte.jpg', 150, '<p>Nescafe Latte Milk Coffee Drink really gives you all the great taste and aroma you expect! Contains a balance between creamy milk and erotic coffee, the formula is perfect to complete your day! It is low in fat and convenient to carry so that you can have it anywhere and anytime.</p>\r\n<p>- Milk-coffee taste</p>\r\n<p>- New Look with same great taste</p>\r\n<p style=\"text-align: justify;\">- Low fat</p>'),
(27, 5, '2021-05-22 06:50:23', 'Nestle Milo Chocolate Powder', '', '', 33.00, 'nestle-milo-chocolate-powder.jpg', 100, '<p style=\"text-align: justify;\">Experience this wonderful Nestle Milo Drink with everyone you love. It is rich with vitamins and minerals and also a good source of protein. This chocolate malt drink is Australian made.</p>'),
(28, 5, '2021-05-22 06:51:58', 'OldTown White Coffee Classic', '', '', 22.00, 'oldtown-white-coffee-classic.jpg', 100, '<p style=\"text-align: justify;\">The perfect combination of finely roasted Mt Kenya Arabica beans, non-dairy creamer and premium raw cane sugar. The medium roast adds to the richness of the coffee. This coffee offers distinct flavours that are smooth-bodied and are characterized by its well balanced fragrant aroma.</p>'),
(29, 5, '2021-05-22 06:52:50', 'Ribena', '', '', 12.00, 'ribena.jpg', 150, '<p style=\"text-align: justify;\">Made from New Zealand blackcurrant, Ribena Blackcurrant guarantees a rich taste of fresh blackcurrant, which is also a great source of Vitamin C for your whole family. It is less in sugar, free from artificial colour, flavour or sweetener. It is very suitable to be served in party as children love the fantastic taste from the beginning to the last drop of it!</p>'),
(30, 5, '2021-05-22 06:54:47', 'Starbucks House Blend', '', '', 25.00, 'starbucks-house-blend.jpg', 100, '<p style=\"text-align: justify;\">A blend of fine Latin American beans roasted to a glistening, dark chestnut colour. Loaded with flavour, balancing taste of nut and cocoa, just a touch of sweetness from the roast. This coffee is Starbuck beginning, the very first blend they created in 1971.</p>'),
(31, 5, '2021-05-22 06:55:59', 'Tropicana Twister', '', '', 10.00, 'tropicana-twister.jpg', 150, '<p style=\"text-align: justify;\">Guaranteed to put a smile on your face! Tropicana Twister Apple Fruit Drink offers all day refreshment, plus a full day&rsquo;s supply of Vitamin C.</p>'),
(32, 4, '2021-05-22 06:57:36', 'Cadbury Dairy Milk', '', '', 9.00, 'cadbury-dairy-milk.jpg', 50, '<p style=\"text-align: justify;\"><span style=\"color: #3a2a2f; font-family: Roboto, sans-serif; font-size: 17px; background-color: #f8f8f8;\">Cadbury Dairy Milk Chocolate is made from fresh milk and cocoa beans remains one of Malaysia&rsquo;s top chocolate brands. It has its own unique taste which is very tempting and generous in milk</span> chocolate!</p>'),
(33, 4, '2021-05-22 06:59:04', 'ChipsMore Original Chocolate Chip Cookies', '', '', 4.00, 'chips-more-ori-choco-chip-cookies.jpg', 150, '<p style=\"text-align: justify;\"><span style=\"color: #3a2a2f; font-family: Roboto, sans-serif; font-size: 17px; background-color: #f8f8f8;\">Chipsmore is a home-grown Malaysian brand that has come to be loved by all generations. These delicious chocolate chip cookies have become known for their generous amount of chocolate chips in every bite. Chipsmore Chocolate Chip Cookies are filled with more chocolate taste, and great for snacking</span> time.</p>'),
(34, 4, '2021-05-22 07:01:48', 'Dahfa Dried Fish Fillet', '', '', 8.00, 'dahfa-dried-fish-fillet.jpg', 150, '<p style=\"text-align: justify;\">Have fun snacking time with Dahfa Dried Fish Fillet! It is rich in protein and minerals especially carbohydrate and calcium. Tasty, nutritious, easily digestible and contains all the natural goodness for the whole family.</p>'),
(35, 4, '2021-05-22 07:02:46', 'Danisa Butter Cookies', '', '', 24.00, 'danisa-butter-cookies.jpg', 50, '<p style=\"text-align: justify;\">Made using the original Danish recipe, Danisa Traditional Butter Cookies have a distinct taste and texture that differentiates them from the rest.</p>'),
(36, 4, '2021-05-22 07:03:44', 'Doritos Tortilla Chips', '', '', 18.00, 'doritos-tortilla-chips.jpg', 50, '<p style=\"text-align: justify;\">Doritos Spicy Nacho Tortilla Chips makes your snacking time more joyful! Perfect on its own or dip it into your favourite sauce for more meaningful crunch.</p>'),
(37, 4, '2021-05-22 07:08:14', 'Loacker Quadratini Wafer Cookies', '', '', 13.00, 'loacker-quadratini-wafer-cookies.jpg', 50, '<p style=\"text-align: justify;\">Loacker Quadratini Wafer Cookies is a wonderful snack that is made of light, crispy wafers that are layered with smooth tiramisu cream filling. These bite-sized wafer cookies can be enjoyed with friends anytime, anywhere.</p>'),
(38, 4, '2021-05-22 07:09:44', 'London Roll Chocolate Flavour Cake', '', '', 6.00, 'london-roll-choco-flavour-cake.jpg', 50, '<p style=\"text-align: justify;\">Can enjoy during free time or having a party.</p>'),
(39, 4, '2021-05-22 07:10:49', 'Mister Potato Chips Honey Cheese', '', '', 5.00, 'mister-potato-chips-honey-cheese.jpg', 100, '<p style=\"text-align: justify;\">Mister Potato Honey Cheese Flavour Potato Crisp is a golden perfection. Only the freshest potatoes imported from farms around the world are used. Bite into the yummiest chips and crisps this side of the world!</p>'),
(40, 4, '2021-05-22 07:11:35', 'Mister Potato Chips Original', '', '', 5.00, 'mister-potato-chips-original.jpg', 100, '<p style=\"text-align: justify;\">Mister Potato Original Flavour Potato Crisp is a golden perfection. Only the freshest potatoes imported from farms around the world are used. Bite into the yummiest chips and crisps this side of the world!</p>'),
(41, 4, '2021-05-22 07:12:47', 'Nata De Coco Mango Pudding', '', '', 12.00, 'nata-de-coco-mango-pudding.jpg', 100, '<p style=\"text-align: justify;\">Cocon Mango Pudding with Nata De Coco is a wonderful dessert and snack that is loved by children and adults alike! You can taste real mangos in each bite, and the nata de coco adds sweetness and chewiness that makes it even more scrumptious.</p>'),
(42, 4, '2021-05-22 07:14:00', 'Oreo Red Velvet', '', '', 3.00, 'oreo-red-velvet.jpg', 150, '<p style=\"text-align: justify;\">Limited Edition. Oreo Red Velvet is a new twist on the classic favorite of millions around the world, with the filling is sweet and slightly tangy.</p>'),
(43, 4, '2021-05-22 07:14:56', 'Oreo Sandwich Cookies', '', '', 3.00, 'oreo-sandwich-cookies.jpg', 100, '<p style=\"text-align: justify;\">Oreo brings an enjoyable moment to your family with its great taste! Oreo Chocolate Creme Sandwich Cookies is perfect for the whole family. It has creamy chocolate cream sandwiched in delicious chocolate biscuits, perfect for dipping, crunch it as a topping, mix with ice cream or you can have it as its own!&nbsp;</p>'),
(44, 4, '2021-05-22 07:17:21', 'Sugus Candy Bag', '', '', 2.00, 'sugus-candy-bag.jpg', 150, '<p style=\"text-align: justify;\">SUGUS! A brand with heritage and we all love to crave to have a bite of Sugus whenever and wherever. SUGUS comes in a variety of flavours and attractive colour packaging.</p>'),
(45, 4, '2021-05-22 07:18:30', 'Tao Kae Noi Crispy Seaweed', '', '', 6.00, 'tao-kae-noi-crispy-seaweed.jpg', 50, '<p style=\"text-align: justify;\">Tao Kae Noi Crispy Fried Seaweed is fully packed with goodness, simply irresistible and delicious that you can consume as a snack or as a supplement to your meals. You can have it frequently as it promotes good health without sacrificing the enjoyment of good taste. Enjoy Tao Kae Noi Wasabi Crispy Fried Seaweed anywhere, anytime, be it at play, at work or while you are travelling.</p>'),
(46, 4, '2021-05-22 07:19:26', 'Twisties Cheezels', '', '', 2.00, 'twisties-cheezels.jpg', 150, '<p style=\"text-align: justify;\">Cheezels Original Cheese Flavoured Snack is a perfect snack for every entertaining occasion, with its crunchy and cheesy taste that will bring a whole lot of cheesy fun in every handful!</p>'),
(47, 4, '2021-05-22 07:20:08', 'Wonka Rainbow Nerds', '', '', 9.00, 'wonka-rainbow-nerds.jpg', 50, '<p style=\"text-align: justify;\">Throwback Nerds Rainbow Candy is a tiny, tangy, crunchy candy that variety of fruits flavour. These candies contain artificial flavours, and very fun to eat!</p>'),
(49, 1, '2021-06-18 08:30:07', 'Avocado12', '', '', 9.00, 'avocado.jpg', 20, '<p style=\"text-align: justify;\">Product of Australia. Hass Avocado (AUS) C30 has a creamy, buttery, and smooth taste. It is cholesterol and sodium-free, avocados can also fit into a variety of healthy eating plans.</p>'),
(50, 1, '2021-05-22 07:35:22', 'Dates 300g', '', '', 23.00, 'dates.jpg', 35, '<p style=\"text-align: justify;\">Dates have a slender, longer, firmer body that is very similar to Ajwa dates. The distinctly less sugary taste is perfect for those who enjoy subtler flavours. Exclusive from Saudi Arabia and 100% natural.</p>'),
(51, 1, '2021-05-22 07:36:16', 'Gong Pear 1kg', '', '', 9.00, 'gong-pear.jpg', 20, '<p style=\"text-align: justify;\">Product of China. Gong Pear (CHN) K11 has a mildly fragrant aroma and a flesh that is crunchy and juicy.&nbsp;</p>'),
(52, 1, '2021-05-22 07:37:02', 'Grapefruit', '', '', 3.00, 'grapefruit.jpg', 35, '<p style=\"text-align: justify;\">Product of Turkey. Grapefruit has a distinctive flesh colour, juicy, sweet and slightly sour flavour. It is an excellent source of vitamin C and a good source of dietary fibre. Available in M to L size.</p>'),
(53, 1, '2021-05-22 07:39:27', 'Green Apple', '', '', 2.00, 'green-apple.jpg', 35, '<p style=\"text-align: justify;\">Product of Turkey. A hard apple with a crisp tart flavour, Granny Smith Apple (TUR) C113 is perfect for baking, freezing, salads, sauces and pies.</p>'),
(54, 1, '2021-05-22 07:40:16', 'Guava 1kg', '', '', 9.00, 'guava.png', 35, '<p style=\"text-align: justify;\">Product of Malaysia. Luo Han Guava (MYS) K17 has a sweet and little bit of tart taste. It emits a strong, sweet, pungent fragrance.</p>'),
(55, 1, '2021-05-22 07:42:27', 'Lemon', '', '', 2.00, 'lemon.jpg', 100, '<p style=\"text-align: justify;\">Lemon are not just for lemonade! There are so many foodie delights you can squeeze out of this tangy fruit, from condiments to puddings.</p>'),
(56, 1, '2021-05-22 07:43:20', 'Limau Kasturi 150g', '', '', 2.00, 'limau-kasturi.jpg', 35, '<p style=\"text-align: justify;\">Product of Malaysia. Calamansi (Limau Kasturi) is known for its fragrant aroma and sourness. They are commonly used to marinate and to add zing to cooking.&nbsp;</p>'),
(57, 1, '2021-05-22 07:44:11', 'Mandarin Orange 1kg', '', '', 9.00, 'mandarin-oranges.png', 35, '<p style=\"text-align: justify;\">Product of Egypt. Honey Murcott Mandarin Orange has a bright orange colour and it is easy to peel. The flesh is sweet and juicy with a lovely fragrance.</p>'),
(58, 1, '2021-05-22 07:45:10', 'Mango 1kg', '', '', 24.00, 'mango.jpeg', 35, '<p style=\"text-align: justify;\">Product of Thailand. Mango has a yellow firm flesh, with a sweet and mild flavour.</p>'),
(59, 1, '2021-05-22 07:46:55', 'Passion Fruit 500g', '', '', 6.00, 'passion-fruit.jpg', 35, '<p style=\"text-align: justify;\">Product of Malaysia. It has an exceptionally juicy yellow-orange pulp and many petite brown seeds. Its flavour is sweet, acidic and tropical with mild floral notes.</p>'),
(60, 1, '2021-05-22 07:47:37', 'Pear', '', '', 3.00, 'pear.jpg', 50, '<p style=\"text-align: justify;\">Product of South Africa. Packham Pear has yellowish-green skin. Its creamy, sweet and aromatic flesh is perfect for eating fresh, as well as for canning or adding to salads or desserts.&nbsp;</p>'),
(61, 1, '2021-05-22 07:49:34', 'Pineapple', '', '', 6.00, 'pineapple.jpg', 50, '<p style=\"text-align: justify;\">Product of Malaysia. Pineapple has exceptional juiciness and a vibrant tropical flavour that balances the tastes of sweet and tart.&nbsp;</p>'),
(62, 1, '2021-05-22 07:50:25', 'Plum 500g', '', '', 22.00, 'plum.jpg', 20, '<p style=\"text-align: justify;\">Product of Australia. Plum are less juicy than other plums, but they have a very intense flavour eaten. With their firm texture and concentrated flavour, they are excellent for cooking in jams or sauces.</p>'),
(63, 1, '2021-05-22 07:51:26', 'Pomelo Citrus 350g', '', '', 12.00, 'pomelo-citrus.jpg', 50, '<p style=\"text-align: justify;\">Product of Sabah. Pomelo is a large citrus fruit with a thick rind and a flesh that tastes like a sweet, mild grapefruit. Often eaten raw and sprinkled with, or dipped in, a salt mixture. Can also be included in salads and drinks as well.</p>'),
(64, 1, '2021-05-22 07:51:56', 'Red Apple', '', '', 6.00, 'red-apple.jpg', 100, '<p>Product of New Zealand. Rose Apple has a sweet flavour and crispy texture.</p>'),
(65, 1, '2021-05-22 07:52:48', 'Rockmelon 1kg', '', '', 12.00, 'rockmelon.jpg', 50, '<p style=\"text-align: justify;\">Product of Australia. Rockmelon has a moist, sweet, orange to peach-coloured flesh and a distinct fragrance.&nbsp;</p>'),
(66, 1, '2021-05-22 07:53:53', 'Seedless White India Grapes 1kg', '', '', 45.00, 'seedless-white-india-grapes.jpg', 20, '<p>Product of India. Crispy, juicy balls of sweetness that explode with freshness in your mouth when you bite into them.</p>'),
(67, 1, '2021-05-22 07:54:45', 'Strawberry 250g', '', '', 24.00, 'strawberry.jpg', 50, '<p>Product of Korea. Sweet, succulent and plump, not only are strawberries delicious, but they are also an excellent source of Vitamin C. Enjoy Strawberry raw, grilled or baked in cakes, dipped in chocolate or in a cocktail.</p>'),
(68, 1, '2021-05-22 07:55:52', 'Watermelon 1kg', '', '', 6.00, 'watermelon.jpg', 50, '<p>Product of Malaysia. Watermelon has a crisp and juicy flesh with a very sweet flavour.&nbsp;</p>'),
(69, 3, '2021-06-16 14:41:42', 'Bacon Rashers 400g', '', '', 38.00, 'bacon-rashers.jpg', 35, '<p>FOR BETTER ENJOYMENT : 1. Soak the unopened vacuum-packed dried meat in hot water for 3-5 minutes. 2. Reheat dried meat in the microwave within 20-30 seconds 3. Put it in the hot pot and fry without oil at medium heat</p>'),
(70, 3, '2021-05-22 07:59:12', 'Buffalo Meat 900g', '', '', 19.00, 'buffalo-meat.png', 20, '<p style=\"text-align: justify;\">Product of India. Frozen deboned buffalo meat.</p>'),
(71, 3, '2021-05-22 08:00:35', 'Chicken Meatballs 850g', '', '', 11.00, 'chicken-meatballs.jpg', 35, '<p>Chicken Meatballs gives you the same great taste as real chickens, but in the form of meatballs. It is easy to prepare and contains low cholesterol to ensure healthier living.&nbsp;</p>'),
(72, 3, '2021-05-22 08:02:30', 'Minced Beef 1kg', '', '', 40.00, 'minced-beef.jpg', 20, '<p style=\"text-align: justify;\">The budget-friendly and versatile cut of beef, suitable as burgers, burritos, meatballs and meatloaf.</p>'),
(73, 3, '2021-05-22 08:05:02', 'Pork Chop 350g', '', '', 20.00, 'pork-chop.jpg', 35, '<p style=\"text-align: justify;\">Grab a Chopped Pork and experience tasty luncheon meat that you can eat on its own or cook with your choice of meat or vegetables to enjoy with rice, noodles or bread. (Non-Halal)</p>'),
(74, 3, '2021-05-22 08:06:21', 'Ramly Beef Burger', '', '', 7.00, 'ramly-beef-burger.jpg', 50, '<p style=\"text-align: justify;\">6 Pieces Of Beef Burger Patties</p>'),
(75, 3, '2021-05-22 08:07:04', 'Ramly Chicken Burger', '', '', 6.00, 'ramly-chicken-burger.jpg', 50, '<p style=\"text-align: justify;\">6 Pieces Of Chicken Burger Patties</p>'),
(76, 2, '2021-05-22 08:09:19', 'Beetroot 450g', '', '', 11.00, 'beetroot.jpg', 20, '<p style=\"text-align: justify;\">Product of Australia. Beetroots are rich in calcium, iron and Vitamins A and C. They are an excellent source of folic acids and a very good source of fibre, manganese and potassium. You can add them in salads or easier to just juice them up.</p>'),
(77, 2, '2021-05-22 08:10:06', 'Broccoli 350g', '', '', 4.00, 'broccoli.jpg', 35, '<p style=\"text-align: justify;\">Product of China. Broccoli is a good choice for those who want to reduce the risk of lifestyle-related health conditions. It can be served in so many ways such as stir-fry, sautee, grill, steam and so on.</p>'),
(78, 2, '2021-05-22 08:11:12', 'Capsicum Traffic Light 500g', '', '', 10.00, 'capsicum-peppers.jpeg', 35, '<p style=\"text-align: justify;\">Product of Malaysia. Capsicum Traffic Light consists of red, yellow and green capsicums. It is a perfect choice for salads and also can be cooked alongside other recipes that you want.</p>'),
(79, 2, '2021-05-22 08:12:03', 'Celery 600g', '', '', 13.00, 'celery.jpg', 20, '<p>Product of Australia. It is perfect for salad dressings or home use as a sensible healthy snack. It can also be a great choice to add into soups, braise it or cook it in your own recipe.</p>'),
(80, 2, '2021-05-22 08:12:59', 'Coriander 50g', '', '', 3.00, 'coriander.jpg', 35, '<p style=\"text-align: justify;\">Product of Malaysia. Coriander is packed with potential health benefits, it is added to cooked and raw dishes around the world to provide a pleasant citrusy flavour.</p>'),
(81, 2, '2021-05-22 08:13:50', 'Eggplant 300g', '', '', 6.00, 'eggplant.png', 20, '<p style=\"text-align: justify;\">Product of Malaysia. It is widely used in cooking due to its pleasantly bitter taste and spongy texture. Not only that, but it can also be served, cooked in any kind of dishes and complements the surrounding flavours for your cookings.</p>'),
(82, 2, '2021-05-22 08:14:48', 'Garlic 1kg', '', '', 9.00, 'garlic.jpg', 35, '<p style=\"text-align: justify;\">Garlic has a pungent, spicy flavour that mellows and sweetens considerably with cooking.</p>'),
(83, 2, '2021-05-22 08:15:33', 'Ginger 200g', '', '', 2.00, 'ginger.jpg', 50, '<p>Product of Thailand. The flesh of old ginger is juicy with a very strong taste. It is often pickled in vinegar as a snack or cooked as an ingredient in many dishes.</p>'),
(84, 2, '2021-05-22 08:16:25', 'Japanese Cucumber 200g', '', '', 2.00, 'japanese-cucumber.jpg', 40, '<p>Product of Malaysia. It is slender, thin-skinned, void of developed seeds, never bitter and entirely edible. It can be served as a snack, in sandwiches, like salad dressings or to accompany your dishes.</p>'),
(85, 2, '2021-05-22 08:17:08', 'Lady Finger 250g', '', '', 3.00, 'lady-finger.jpg', 35, '<p style=\"text-align: justify;\">Fresh Lady Finger (Okra) is great for any vegetable dishes. It is rich in dietary fibres, Vitamin C and Vitamin K.</p>'),
(86, 2, '2021-05-22 08:17:45', 'Leeks 300g', '', '', 3.00, 'leeks.jpg', 35, '<p style=\"text-align: justify;\">Product of Malaysia. Leeks taste like a slightly milder, sweeter and mellower typical onion. They can be sauteed, roasted, steamed, stir-fried and just plain fried.&nbsp;</p>'),
(87, 2, '2021-05-22 08:18:28', 'Long Beans 300g', '', '', 4.00, 'long-beans.jpg', 35, '<p style=\"text-align: justify;\">The beans are deliciously tender and have a sweet taste.</p>'),
(88, 2, '2021-05-22 08:19:10', 'Mint Leaf 100g', '', '', 2.00, 'mint-leaf.jpeg', 35, '<p style=\"text-align: justify;\">Product of Malaysia. Mint leaves are great for seasoning your sauces, salads, stews, or adding them to a cup of tea. It is packed with antioxidants and phytonutrients.</p>'),
(89, 2, '2021-05-22 08:19:57', 'Oyster Mushroom 200g', '', '', 3.00, 'oyster-mushroom.jpg', 20, '<p style=\"text-align: justify;\">Product of Malaysia. Oyster Mushroom has a firm yet meaty texture with a savoury flavour. They are best enjoyed in soups, stir-fries, and braised dishes with seafood, pork, garlic, ginger, soy, Asian vegetables and etc.</p>'),
(90, 2, '2021-05-22 08:20:47', 'Potato 1kg', '', '', 3.00, 'potato.jpg', 50, '<p style=\"text-align: justify;\">Product of Bangladesh. Potato has dark brown skin, with white-yellowish flesh. They taste good, whether mashed, baked or roasted.</p>'),
(91, 2, '2021-05-22 08:21:30', 'Pumpkin 1kg', '', '', 4.00, 'pumpkin.png', 20, '<p style=\"text-align: justify;\">Product of Malaysia. Sweet Pumpkin has fantastic health benefits, such as beta-carotene. Also, great to be used in any cooking recipes.</p>'),
(92, 2, '2021-05-22 08:22:23', 'Red Chili 1kg', '', '', 14.00, 'red-chili.jpg', 50, '<p>Product of Malaysia. Vivid, deep-coloured Red Chili to spice up your dishes.</p>'),
(93, 2, '2021-05-22 08:23:05', 'Red Onion 1kg', '', '', 3.00, 'red-onion.jpg', 50, '<p style=\"text-align: justify;\">Red Onion (Bawang Besar Merah) has a pungent smell, usually used in cooking to enhance the flavour of your dishes.</p>'),
(94, 2, '2021-05-22 08:23:47', 'Spring Onion 100g', '', '', 3.00, 'spring-onion.jpg', 40, '<p style=\"text-align: justify;\">Product of Malaysia. They have a sweet and mellow taste and can be eaten raw or cooked.&nbsp;</p>'),
(95, 2, '2021-05-22 08:24:50', 'Sweet Potato 1kg', '', '', 21.00, 'sweet-potato.jpg', 30, '<p style=\"text-align: justify;\">Grown and harvested in Australia, Orange Sweet Potato has a creamy texture and sweet-spicy flavour. It is delicious roasted, mashed, steamed, barbequed, and baked!</p>'),
(96, 2, '2021-05-22 08:25:38', 'Turnip (Sengkuang) 400g', '', '', 2.00, 'turnip-sengkuang.jpg', 20, '<p style=\"text-align: justify;\">Product of Malaysia. Turnip or known as Sengkuang, tastes great when eaten raw. It is juicy, sweet and crunchy and great in stir-fry dishes too.</p>'),
(97, 2, '2021-05-22 08:26:18', 'White Radish 1kg', '', '', 3.00, 'white-radish.jpg', 35, '<p style=\"text-align: justify;\">Product of Malaysia. White Radish or Daikon is used to add flavour to relishes and salads thanks to its sharp bite. Its also used in Chinese soups and stir-fries.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `productinlist`
--

CREATE TABLE `productinlist` (
  `ProductInListID` int(10) NOT NULL,
  `ListID` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(100) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productinlist`
--

INSERT INTO `productinlist` (`ProductInListID`, `ListID`, `product_id`, `quantity`, `id`) VALUES
(217, 108, 70, 2, 172),
(218, 109, 71, 1, 172),
(219, 108, 49, 2, 172);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`) VALUES
(1, 'Fruits'),
(2, 'Vegetables'),
(3, 'Meat'),
(4, 'Cookies & Snacks'),
(5, 'Beverages');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passwordd` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `passwordd`, `user_type`, `token`) VALUES
(161, 'admin', 'admin@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'admin', 'qw23qw1231'),
(172, 'hazieq', 'muhammadhazieq00@gmail.com', '85c58f1677c957fcd40bc923235cf06e', 'user', 'gntzpakdlo');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `userDetailID` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phoneNo` varchar(100) NOT NULL,
  `dateOfBirth` varchar(100) NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`userDetailID`, `id`, `name`, `phoneNo`, `dateOfBirth`, `street`, `city`, `state`, `zipcode`, `image`) VALUES
(90, 172, 'Update your profile', '-', 'Update your profile', 'Update your profile', 'Update your profile', 'Update your profile', 'Update your profile', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `listname`
--
ALTER TABLE `listname`
  ADD PRIMARY KEY (`ListID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `productinlist`
--
ALTER TABLE `productinlist`
  ADD PRIMARY KEY (`ProductInListID`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`userDetailID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `listname`
--
ALTER TABLE `listname`
  MODIFY `ListID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `productinlist`
--
ALTER TABLE `productinlist`
  MODIFY `ProductInListID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `userDetailID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

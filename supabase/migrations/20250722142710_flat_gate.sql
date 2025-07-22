-- Sample data for OCP Shop

-- Insert sample users (passwords are hashed for 'password123')
INSERT INTO users (name, email, password) VALUES
('Ahmed Benali', 'ahmed@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
('Fatima Zahra', 'fatima@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
('Youssef Alami', 'youssef@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
('Khadija Mansouri', 'khadija@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
('Omar Tazi', 'omar@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Insert sample products with Pexels images
INSERT INTO products (name, description, price, category, image_url) VALUES
('Smartphone Premium Galaxy', 'Smartphone dernière génération avec écran OLED 6.7 pouces, appareil photo 108MP et processeur octa-core. Parfait pour les professionnels et les passionnés de technologie.', 8999.00, 'Électronique', 'https://images.pexels.com/photos/607812/pexels-photo-607812.jpeg?auto=compress&cs=tinysrgb&w=400'),

('MacBook Pro 16 pouces', 'Ordinateur portable haute performance avec puce M2 Pro, 16GB RAM unifié, SSD 512GB. Idéal pour le développement, design et montage vidéo.', 25999.00, 'Informatique', 'https://images.pexels.com/photos/18105/pexels-photo.jpg?auto=compress&cs=tinysrgb&w=400'),

('AirPods Pro Max', 'Casque Bluetooth premium avec réduction de bruit active adaptative. Audio spatial, autonomie 20h, design aluminium premium.', 4299.00, 'Audio', 'https://images.pexels.com/photos/3394650/pexels-photo-3394650.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Apple Watch Ultra', 'Montre connectée ultra-résistante avec GPS précis, moniteur cardiaque avancé et suivi d\'activité complet. Parfaite pour les aventuriers.', 6999.00, 'Wearables', 'https://images.pexels.com/photos/437037/pexels-photo-437037.jpeg?auto=compress&cs=tinysrgb&w=400'),

('iPad Pro 12.9 avec Apple Pencil', 'Tablette professionnelle avec écran Liquid Retina XDR, puce M2 et Apple Pencil inclus. Parfaite pour les créatifs et professionnels.', 12999.00, 'Tablettes', 'https://images.pexels.com/photos/1779487/pexels-photo-1779487.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Canon EOS R6 Mark II', 'Appareil photo hybride professionnel 24MP avec stabilisation 5 axes et objectif RF 24-105mm. Excellence en photo et vidéo 4K.', 18999.00, 'Photo', 'https://images.pexels.com/photos/90946/pexels-photo-90946.jpeg?auto=compress&cs=tinysrgb&w=400'),

('JBL Charge 5 Portable', 'Enceinte Bluetooth étanche IP67 avec son JBL Pro, autonomie 20h et fonction powerbank. Parfaite pour toutes vos aventures.', 1299.00, 'Audio', 'https://images.pexels.com/photos/1649771/pexels-photo-1649771.jpeg?auto=compress&cs=tinysrgb&w=400'),

('DJI Mini 3 Pro', 'Drone ultra-compact avec caméra 4K/60fps, détection d\'obstacles tri-directionnelle et transmission 12km. Créativité sans limites.', 7999.00, 'Drones', 'https://images.pexels.com/photos/442587/pexels-photo-442587.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Logitech MX Master 3S', 'Souris ergonomique sans fil avec capteur 8000 DPI, défilement ultra-rapide et autonomie 70 jours. Productivité maximale.', 899.00, 'Accessoires', 'https://images.pexels.com/photos/2115257/pexels-photo-2115257.jpeg?auto=compress&cs=tinysrgb&w=400'),

('LG UltraWide 34WP65C', 'Moniteur incurvé 34 pouces WQHD avec technologie IPS et USB-C. Parfait pour le multitâche et la création de contenu.', 4999.00, 'Moniteurs', 'https://images.pexels.com/photos/1029757/pexels-photo-1029757.jpeg?auto=compress&cs=tinysrgb&w=400'),

('PlayStation 5 Console', 'Console de jeu nouvelle génération avec SSD ultra-rapide, ray tracing et audio 3D. Expérience gaming révolutionnaire.', 5499.00, 'Gaming', 'https://images.pexels.com/photos/3945683/pexels-photo-3945683.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Nintendo Switch OLED', 'Console portable avec écran OLED 7 pouces, dock amélioré et 64GB de stockage. Gaming nomade et familial.', 3299.00, 'Gaming', 'https://images.pexels.com/photos/1174746/pexels-photo-1174746.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Bose QuietComfort 45', 'Casque à réduction de bruit leader du marché avec autonomie 24h et confort exceptionnel. Silence parfait partout.', 3199.00, 'Audio', 'https://images.pexels.com/photos/3394651/pexels-photo-3394651.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Samsung Galaxy Tab S8 Ultra', 'Tablette Android premium 14.6 pouces avec S Pen inclus, parfaite pour la productivité et la créativité mobile.', 9999.00, 'Tablettes', 'https://images.pexels.com/photos/1334597/pexels-photo-1334597.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Dyson V15 Detect', 'Aspirateur sans fil intelligent avec détection laser de poussière et autonomie 60 minutes. Nettoyage scientifique.', 6499.00, 'Électroménager', 'https://images.pexels.com/photos/4239146/pexels-photo-4239146.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Tesla Model Y Accessoires', 'Kit d\'accessoires premium pour Tesla Model Y : tapis, organisateurs et chargeurs sans fil. Élégance et fonctionnalité.', 2999.00, 'Automobile', 'https://images.pexels.com/photos/3802510/pexels-photo-3802510.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Philips Hue Starter Kit', 'Kit éclairage connecté avec 3 ampoules couleur, pont et variateur. 16 millions de couleurs pour votre maison intelligente.', 1899.00, 'Maison connectée', 'https://images.pexels.com/photos/1112598/pexels-photo-1112598.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Nespresso Vertuo Next', 'Machine à café connectée avec technologie Centrifusion et 5 tailles de tasses. Café d\'exception à domicile.', 1599.00, 'Électroménager', 'https://images.pexels.com/photos/302899/pexels-photo-302899.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Fitbit Charge 5', 'Bracelet fitness avancé avec GPS, ECG et gestion du stress. Santé et forme au quotidien avec 6 mois Fitbit Premium.', 1799.00, 'Fitness', 'https://images.pexels.com/photos/4498362/pexels-photo-4498362.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Kindle Oasis 32GB', 'Liseuse premium avec écran 7 pouces, éclairage adaptatif et résistance à l\'eau. Bibliothèque infinie dans vos mains.', 2799.00, 'Lecture', 'https://images.pexels.com/photos/1029141/pexels-photo-1029141.jpeg?auto=compress&cs=tinysrgb&w=400');

-- Insert sample orders
INSERT INTO orders (user_id, total_amount, order_date) VALUES
(1, 13298.00, '2024-01-15 10:30:00'),
(2, 6999.00, '2024-01-16 14:20:00'),
(1, 5798.00, '2024-01-18 09:15:00'),
(3, 25999.00, '2024-01-20 16:45:00'),
(4, 8298.00, '2024-01-22 11:30:00'),
(2, 3199.00, '2024-01-25 13:20:00'),
(5, 14998.00, '2024-01-28 15:10:00');

-- Insert sample order items
INSERT INTO order_items (order_id, product_id, quantity, price) VALUES
-- Order 1 (Ahmed)
(1, 1, 1, 8999.00),
(1, 7, 1, 1299.00),
(1, 13, 1, 3199.00),

-- Order 2 (Fatima)
(2, 4, 1, 6999.00),

-- Order 3 (Ahmed)
(3, 3, 1, 4299.00),
(3, 18, 1, 1599.00),

-- Order 4 (Youssef)
(4, 2, 1, 25999.00),

-- Order 5 (Khadija)
(5, 1, 1, 8999.00),
(5, 19, 1, 1799.00),

-- Order 6 (Fatima)
(6, 13, 1, 3199.00),

-- Order 7 (Omar)
(7, 5, 1, 12999.00),
(7, 17, 1, 1899.00);
-- Sample data for OCP Shop

-- Insert sample users (passwords are hashed for 'password123')
INSERT INTO users (name, email, password) VALUES
('Ahmed Benali', 'ahmed@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
('Fatima Zahra', 'fatima@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
('Youssef Alami', 'youssef@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Insert sample products with Pexels images
INSERT INTO products (name, description, price, category, image_url) VALUES
('Smartphone Premium', 'Smartphone dernière génération avec écran OLED et appareil photo haute résolution. Parfait pour les professionnels et les passionnés de technologie.', 8999.00, 'Électronique', 'https://images.pexels.com/photos/607812/pexels-photo-607812.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Ordinateur Portable Gaming', 'PC portable haute performance pour gaming et travail intensif. Processeur Intel i7, 16GB RAM, carte graphique dédiée.', 15999.00, 'Informatique', 'https://images.pexels.com/photos/2047905/pexels-photo-2047905.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Casque Audio Sans Fil', 'Casque Bluetooth premium avec réduction de bruit active. Autonomie 30h, son haute fidélité, confort optimal.', 1299.00, 'Audio', 'https://images.pexels.com/photos/3394650/pexels-photo-3394650.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Montre Connectée Sport', 'Montre intelligente étanche avec GPS, moniteur cardiaque et suivi d\'activité. Parfaite pour les sportifs.', 2499.00, 'Wearables', 'https://images.pexels.com/photos/437037/pexels-photo-437037.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Tablette Graphique Pro', 'Tablette professionnelle pour designers et artistes. Stylet haute précision, écran tactile 12 pouces.', 3999.00, 'Design', 'https://images.pexels.com/photos/1779487/pexels-photo-1779487.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Appareil Photo Reflex', 'Appareil photo numérique professionnel 24MP avec objectif 18-55mm. Idéal pour la photographie créative.', 12999.00, 'Photo', 'https://images.pexels.com/photos/90946/pexels-photo-90946.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Enceinte Bluetooth Portable', 'Enceinte sans fil étanche avec son 360°. Parfaite pour les sorties et les fêtes. Autonomie 12h.', 899.00, 'Audio', 'https://images.pexels.com/photos/1649771/pexels-photo-1649771.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Drone avec Caméra 4K', 'Drone professionnel avec caméra stabilisée 4K. Portée 2km, vol automatique, parfait pour la vidéographie.', 5999.00, 'Drones', 'https://images.pexels.com/photos/442587/pexels-photo-442587.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Clavier Mécanique RGB', 'Clavier gaming mécanique avec rétroéclairage RGB personnalisable. Switches Cherry MX, anti-ghosting.', 799.00, 'Gaming', 'https://images.pexels.com/photos/2115257/pexels-photo-2115257.jpeg?auto=compress&cs=tinysrgb&w=400'),

('Écran 4K Ultra-Wide', 'Moniteur professionnel 32 pouces 4K avec technologie IPS. Parfait pour le multitâche et la création.', 6999.00, 'Moniteurs', 'https://images.pexels.com/photos/1029757/pexels-photo-1029757.jpeg?auto=compress&cs=tinysrgb&w=400');

-- Insert sample orders
INSERT INTO orders (user_id, total_amount, order_date) VALUES
(1, 10298.00, '2024-01-15 10:30:00'),
(2, 2499.00, '2024-01-16 14:20:00'),
(1, 1698.00, '2024-01-18 09:15:00');

-- Insert sample order items
INSERT INTO order_items (order_id, product_id, quantity, price) VALUES
-- Order 1
(1, 1, 1, 8999.00),
(1, 7, 1, 899.00),
(1, 9, 1, 799.00),

-- Order 2
(2, 4, 1, 2499.00),

-- Order 3
(3, 3, 1, 1299.00),
(3, 9, 1, 799.00);
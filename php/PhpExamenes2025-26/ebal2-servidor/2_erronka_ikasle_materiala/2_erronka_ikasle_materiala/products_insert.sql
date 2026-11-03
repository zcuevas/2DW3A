INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `points_balance`, `rol`, `last_favorite_at`) VALUES
(2, 'Admin', 'admin@admin.com', '2026-01-28 04:37:06', 'password', 'Zo9lSpUIeX', '2026-01-28 04:37:06', '2026-01-28 04:37:06', 100, 'registered', NULL);


INSERT INTO `products` (`id`, `name`, `description`, `points_value`, `status`, `image_url`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'JXAYA Pantalones clásicos', 'Zure ezinbesteko eguneroko berria. Denboraz kanpoko diseinuarekin eta egokitzapen erosoarekin, ezinbestekoak diren hauek esfortzurik gabeko estiloa eskaintzen dute asteko edozein egunetan.', 20, 'available', 'pantalones.png', 2, '2026-02-03 04:50:00', '2026-02-03 04:50:00'),
(2, 'loreak zaraman', 'loreak zaraman\r\nRoberto Moso\r\n\r\nBueltan da Roberto Mosoren libururik ezagunena, itzulpen berri batekin eta Gotzon Hermosilla zein egilearen hitzaurreekin. \r\nZarama rock taldearen jaiotza, bizitza eta heriotza abiapuntutzat hartuta, Roberto Mosok bere ibilbidearen une garrantzitsuenak kontatzen dizkigu. \r\nLoreak zaraman liburuak Euskal Rock Erradikalaren kulturan murgiltzen gaitu, garai hartako giroan barrenduz eta gertakari zein talde ikonikoenak lehen lerroan jarriz; hala nola, Eskorbuto, La Polla Records edota Hertzainak.', 10, 'available', 'loreak_zaraman.png', 2, '2026-02-03 04:50:56', '2026-02-03 04:50:56'),
(3, 'Microondas Cecotec Inoxidable', 'Cecotec mikrouhin-labea, altzairu herdoilgaitzezko akaberarekin.\r\n\r\n- Diseinu modernoa eta dotorea.\r\n- Ispilu-akabera duen atea.\r\n- Kontrol-panel digitala.\r\n- Berria. Oso gutxi erabiltzen da etxez aldatzeagatik.', 15, 'reserved', 'microondas.png', 1, '2026-02-03 14:53:25', '2026-02-03 14:53:25'),
(4, 'Baloia. Athletic Club Bilbaoko sinadurekin', 'Baloia.\r\nAthletic Club Bilbao: (Julen Guerrero, Yeste, Mendilibar, Escalona, Lafuente, Murillo, Tiko, Prieto, Orbaiz, Iraola...)', 5, 'available', 'athletic_baloia.png', 2, '2026-02-03 14:55:53', '2026-02-03 14:55:53'),
(5, 'Sudadera Juicy Cherry Blanco Crema', 'KONPOSIZIOA:100% Co 450 g barrra-m2\r\nEBAKETA: doikuntza estandarra\r\nGRAFIKOA: Aurrealdea: Puff Print eta SerigrafiaAtzera: Serigrafia eta Puff Print\r\nXEHETASUN TEKNIKOAK:Kanguru motako aurreko poltsikoa', 15, 'reserved', 'sudadera.png', 2, '2026-02-04 04:44:22', '2026-02-04 04:44:22'),
(6, 'Reproductor de mp3 - MP3/MP4 Bluetooth', 'mp3-en ekoizlea - MP3/MP4 Bluetooth Pertsonalizatua Gurutze Ikaslea Erreproduzitzailea Kirolak Walkman Ingelesa Erreproduzitzailea BYTELIKE, 64 GB, 8 ordu arte, beltza', 15, 'available', 'mp3.png', 1, '2026-02-04 04:51:08', '2026-02-04 04:51:08'),
(7, 'Estuche Old Skool Vans', 'Vans-en estilo klasikoa duen kutxatila. Aproposa arkatz, boli eta altxor txikietarako. Trinkoa, erresistentea eta flow handikoa.\r\nKonposizioa: 100% Poliester', 8, 'available', 'estuche_vans.png',1, '2026-02-04 05:00:00', '2026-02-04 05:00:00'),
(8, 'Mancuernas Studio 4 kg Home Evergy', 'Biniloz estalitako mankuernak klasiko bat dira zuzendutako jardueren artean. Kolore bidezko kodifikazioak lan egiteko erabiltzen diren pisuak erraz identifikatzen laguntzen du. Gainera, erabiltzen den gama kromatikoa aretoei bizitasuna eta energia emateko pentsatuta dago.', 12, 'available', 'mankuernak.png', 1, '2026-02-04 05:01:00', '2026-02-04 05:01:00');

INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2026-02-03 04:50:00', '2026-02-03 04:50:00'),
(2, 2, 2, '2026-02-03 04:50:56', '2026-02-03 04:50:56'),
(3, 4, 3, '2026-02-03 14:53:25', '2026-02-03 14:53:25'),
(4, 5, 4, '2026-02-03 14:55:53', '2026-02-03 14:55:53'),
(5, 3, 5, '2026-02-04 04:44:22', '2026-02-04 04:44:22'),
(6, 1, 6, '2026-02-04 04:51:08', '2026-02-04 04:51:08'),
(7, 4, 7, '2026-02-04 05:00:00', '2026-02-04 05:00:00'),
(8, 5, 8, '2026-02-04 05:01:00', '2026-02-04 05:01:00');
INSERT INTO `autos_flexi_fly_drives` (`id`, `imagen`, `capacidad_pasajero`, `aire_acondicionado`, `air_baqs`, `puertas`, `motor`, `categoria`, `rentadora`, `reproductor`, `trasnmision`, `tipo`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'autosflexifly/UYG62byTHCNpo2aw1s88EKOdNydrxcK8ebb4wZNX.png', 4, 'Si', 'Si', 4, '1.6', 'C', 'REX', 'Mp3', 'automática', 'Standard', 'Admin', '2020-08-11 05:40:07', '2020-08-11 05:40:07'),
(2, 'autosflexifly/ZxYfVHSRgfiic4of974jDaC8pbslqFtzq3rLPF1b.jpeg', 5, 'Si', 'Si', 4, '2.0', 'E', 'REX', 'Mp3 \\ SD \\CD', 'automática', 'Premium Plus', 'Admin', '2020-08-11 05:43:54', '2020-08-11 05:43:54'),
(3, 'autosflexifly/6imM8Pd7tWTBshMpdLO5WKT5oUjCMGnGKrgS683u.jpeg', 7, 'Si', 'Si', 3, '2.0', 'H', 'REX', 'Mp3', 'Manual', 'Minivan', 'Admin', '2020-08-11 05:47:45', '2020-08-11 05:47:45'),
(4, 'autosflexifly/kMwsfcrnU2VZIZR5MUYfWxt9nL1UAIV0oKjSA9Dy.jpeg', 4, 'Si', 'Si', 4, '2.4', 'G', 'REX', 'Mp3', 'automática', 'Jeep', 'Admin', '2020-08-11 05:57:36', '2020-08-11 05:57:36'),
(5, 'autosflexifly/J4CHo05ItnSBXZ6JnNwsW2U5R0npocWogOOe4R57.jpeg', 5, 'Si', 'Si', 4, '2.0', 'F+', 'REX', 'Mp3 \\ SD \\CD \\ USB \\Bluetooth', 'automática', 'Lujo Plus', 'Admin', '2020-08-11 06:03:09', '2020-08-11 06:03:09');


INSERT INTO `autos_flexi_fly_drive_traslations` (`id`, `caracteristicas`, `locale`, `created_by`, `created_at`, `updated_at`, `autosdrive_id`) VALUES
(1, 'Mercedes Benz B180', 'es', 'Admin', '2020-08-11 05:40:07', '2020-08-11 05:40:07', 1),
(2, 'Mercedes Benz B180', 'en', 'Admin', '2020-08-11 05:40:07', '2020-08-11 05:40:07', 1),
(3, 'Mercedes Benz B180', 'fr', 'Admin', '2020-08-11 05:40:07', '2020-08-11 05:40:07', 1),
(4, 'Mercedes Benz B180', 'de', 'Admin', '2020-08-11 05:40:07', '2020-08-11 05:40:07', 1),
(5, 'Mercedes Benz B180', 'it', 'Admin', '2020-08-11 05:40:07', '2020-08-11 05:40:07', 1),
(6, 'Mercedes Benz B180', 'pt', 'Admin', '2020-08-11 05:40:08', '2020-08-11 05:40:08', 1),
(7, 'Mercedes Benz c200', 'es', 'Admin', '2020-08-11 05:43:54', '2020-08-11 05:43:54', 2),
(8, 'Mercedes Benz c200', 'en', 'Admin', '2020-08-11 05:43:55', '2020-08-11 05:43:55', 2),
(9, 'Mercedes Benz c200', 'fr', 'Admin', '2020-08-11 05:43:55', '2020-08-11 05:43:55', 2),
(10, 'Mercedes Benz c200', 'de', 'Admin', '2020-08-11 05:43:55', '2020-08-11 05:43:55', 2),
(11, 'Mercedes Benz c200', 'it', 'Admin', '2020-08-11 05:43:55', '2020-08-11 05:43:55', 2),
(12, 'Mercedes Benz c200', 'pt', 'Admin', '2020-08-11 05:43:55', '2020-08-11 05:43:55', 2),
(13, 'Maxus G10', 'es', 'Admin', '2020-08-11 05:47:45', '2020-08-11 05:47:45', 3),
(14, ' Maxus G10\r\n', 'en', 'Admin', '2020-08-11 05:47:45', '2020-08-11 05:47:45', 3),
(15, 'Maxus G10', 'fr', 'Admin', '2020-08-11 05:47:46', '2020-08-11 05:47:46', 3),
(16, 'Maxus G10', 'de', 'Admin', '2020-08-11 05:47:46', '2020-08-11 05:47:46', 3),
(17, 'Maxus G10', 'it', 'Admin', '2020-08-11 05:47:46', '2020-08-11 05:47:46', 3),
(18, 'Maxus G10', 'pt', 'Admin', '2020-08-11 05:47:46', '2020-08-11 05:47:46', 3),
(19, 'Hyundai Santa Fe', 'es', 'Admin', '2020-08-11 05:57:36', '2020-08-11 05:57:36', 4),
(20, 'Hyundai Santa Fe', 'en', 'Admin', '2020-08-11 05:57:36', '2020-08-11 05:57:36', 4),
(21, 'Hyundai Santa Fe', 'fr', 'Admin', '2020-08-11 05:57:36', '2020-08-11 05:57:36', 4),
(22, 'Hyundai Santa Fe', 'de', 'Admin', '2020-08-11 05:57:36', '2020-08-11 05:57:36', 4),
(23, 'Hyundai Santa Fe', 'it', 'Admin', '2020-08-11 05:57:37', '2020-08-11 05:57:37', 4),
(24, 'Hyundai Santa Fe', 'pt', 'Admin', '2020-08-11 05:57:37', '2020-08-11 05:57:37', 4),
(25, 'Mercedes Benz E200', 'es', 'Admin', '2020-08-11 06:03:10', '2020-08-11 06:03:10', 5),
(26, 'Mercedes Benz E200', 'en', 'Admin', '2020-08-11 06:03:10', '2020-08-11 06:03:10', 5),
(27, 'Mercedes Benz E200', 'fr', 'Admin', '2020-08-11 06:03:10', '2020-08-11 06:03:10', 5),
(28, 'Mercedes Benz E200', 'de', 'Admin', '2020-08-11 06:03:10', '2020-08-11 06:03:10', 5),
(29, 'Mercedes Benz E200', 'it', 'Admin', '2020-08-11 06:03:10', '2020-08-11 06:03:10', 5),
(30, 'Mercedes Benz E200', 'pt', 'Admin', '2020-08-11 06:03:10', '2020-08-11 06:03:10', 5);

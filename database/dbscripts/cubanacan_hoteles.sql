INSERT INTO `hotels` (`id`, `nombre`, `telefono`, `email`, `dias_antelacion_reserva_id`, `imagen`, `precio_desde`, `oferta_especial`, `estado`, `facilidades_ids`, `created_by`, `created_at`, `updated_at`, `provincia_id`, `plan_alojamiento_id`, `categoria_id`) VALUES
(1, 'Habana Libre', '(+53) 7586-9852', 'habanalibre@gmail.com', 3, 'hoteles/slLzFYMazW5y8PnO5QdMWAENXchtBLct9dVo8xO8.jpeg', 450, 'Activo', 'Activo', '1,2,3,4', 'Admin', '2020-04-25 06:43:01', '2020-04-25 06:43:01', 3, '1,2', 3),
(3, 'Melia Cohiba', '(+53) 7895-6423', 'meliacohiba@gmail.com', 1, 'hoteles/GsuNR9pobzAvIRHUxyL1XPXgAZeRYf81UITLzCYM.jpeg', 521, 'Activo', 'Activo', '3,5,6,9,17', 'Admin', '2020-04-25 07:10:07', '2020-04-27 07:30:56', 3, '1,3', 4),
(4, 'Panorama', '(+53) 7823-5468', 'panorama@gmail.com', 4, 'hoteles/Cbjm72kWcGYJDL4R6OVHij89RI9HCmnAV4MiQSyD.jpeg', 478, 'Activo', 'Activo', '2,3,4,5', 'Admin', '2020-04-25 07:12:48', '2020-04-26 08:22:23', 3, '1,2,3', 5);

INSERT INTO `hotel_flexy_drives` (`id`, `hotel_id`, `provincia_id`, `cantidad_habitaciones_dobles`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 10, 'Admin', '2020-08-11 19:33:32', '2020-08-11 19:33:32'),
(2, 3, 3, 15, 'Admin', '2020-08-11 19:33:50', '2020-08-11 19:33:50'),
(3, 4, 3, 20, 'Admin', '2020-08-11 19:34:11', '2020-08-11 19:34:11');

INSERT INTO `hotel_traslations` (`id`, `direccion`, `descripcion`, `locale`, `created_by`, `hotel_id`, `created_at`, `updated_at`) VALUES
(1, 'Ave 23 % M y O, Vedado, Plaza de la Revolucion', '<p>asfdas<br></p>', 'es', 'Admin', 1, '2020-04-25 06:43:01', '2020-04-25 06:43:01'),
(2, 'asdfas', '<p>asfsadsa<br></p>', 'en', 'Admin', 1, '2020-04-25 06:43:02', '2020-04-25 06:43:02'),
(3, 'sadfas', '<p>safsa<br></p>', 'fr', 'Admin', 1, '2020-04-25 06:43:02', '2020-04-25 06:43:02'),
(4, 'asfdas', '<p>sadfas<br></p>', 'de', 'Admin', 1, '2020-04-25 06:43:02', '2020-04-25 06:43:02'),
(5, 'asfdas', '<p>asfdsa<br></p>', 'it', 'Admin', 1, '2020-04-25 06:43:02', '2020-04-25 06:43:02'),
(6, 'safdasasd', '<p>safdsafsa<br></p>', 'pt', 'Admin', 1, '2020-04-25 06:43:02', '2020-04-25 06:43:02'),
(13, 'Calle Paseo % 3ra y Malecon', '<p>asdgfsdgds<br></p>', 'es', 'Admin', 3, '2020-04-25 07:10:07', '2020-04-25 07:10:07'),
(14, 'dsfgs', '<p>dsfgsdfg<br></p>', 'en', 'Admin', 3, '2020-04-25 07:10:07', '2020-04-25 07:10:07'),
(15, 'dsgfs', '<p>sdgfsdgf<br></p>', 'fr', 'Admin', 3, '2020-04-25 07:10:07', '2020-04-25 07:10:07'),
(16, 'dsgsd', '<p>sdgsdgfs<br></p>', 'de', 'Admin', 3, '2020-04-25 07:10:07', '2020-04-25 07:10:07'),
(17, 'dgssd', '<p>sdgsgfdsg<br></p>', 'it', 'Admin', 3, '2020-04-25 07:10:07', '2020-04-25 07:10:07'),
(18, 'dsgsd', '<p>sdgfdsgsd<br></p>', 'pt', 'Admin', 3, '2020-04-25 07:10:07', '2020-04-25 07:10:07'),
(19, 'Calle 70 % 1ra y 3ra, Playa', '<p>asdfgdsg<br></p>', 'es', 'Admin', 4, '2020-04-25 07:12:48', '2020-04-25 07:12:48'),
(20, 'dsfgds', '<p>dsfgsdgf<br></p>', 'en', 'Admin', 4, '2020-04-25 07:12:48', '2020-04-25 07:12:48'),
(21, 'dsfgsd', '<p>dfsgdsgf<br></p>', 'fr', 'Admin', 4, '2020-04-25 07:12:48', '2020-04-25 07:12:48'),
(22, 'dsfgdsgf', '<p>dsfgdsgs<br></p>', 'de', 'Admin', 4, '2020-04-25 07:12:48', '2020-04-25 07:12:48'),
(23, 'dsfgds', '<p>dsfgsdgds<br></p>', 'it', 'Admin', 4, '2020-04-25 07:12:48', '2020-04-25 07:12:48'),
(24, 'dsfgsd', '<p>dsfgsdgds<br></p>', 'pt', 'Admin', 4, '2020-04-25 07:12:48', '2020-04-25 07:12:48');

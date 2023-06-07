USE superhero;

SELECT * FROM superhero;

DELIMITER $$
CREATE PROCEDURE spu_superhero_list(IN _publisher_id INT)
BEGIN
SELECT 
	superhero.`id`,
	superhero.`superhero_name`,
	superhero.`full_name`,
	gender.`gender`,
	c1.`colour` 'eye_colour',
	c2.`colour` 'hair_colour',
	c3.`colour` 'skin_colour',
	race.`race`,
	publisher.`publisher_name`,
	alignment.`alignment`,
	superhero.`height_cm`,
	superhero.`weight_kg`
	
	FROM superhero
	INNER JOIN gender ON gender.`id` = superhero.`gender_id` 
	INNER JOIN colour c1 ON c1.`id` = superhero.`eye_colour_id`
	INNER JOIN colour c2 ON c2.`id` = superhero.`hair_colour_id`
	INNER JOIN colour c3 ON c3.`id` = superhero.`skin_colour_id`
	LEFT JOIN race ON race.`id` = superhero.`race_id`
	LEFT JOIN publisher ON publisher.`id` = superhero.`publisher_id`
	LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
	WHERE superhero.`publisher_id` = _publisher_id
	ORDER BY superhero.`id`;
END $$

--	call spu_list(1,1,1);
SELECT * FROM Alignment;


DELIMITER $$
CREATE PROCEDURE spu_list(IN _rice_id INT, IN _gender_id INT, IN _aligement_id INT)
BEGIN
SELECT 
	superhero.`id`,
	superhero.`superhero_name`,
	publisher.`publisher_name`,
	c1.`colour` 'hair_colour',
	superhero.`weight_kg`,
	race.`race`
	FROM superhero
	
	INNER JOIN gender ON gender.`id` = superhero.`gender_id` 
	INNER JOIN colour c1 ON c1.`id` = superhero.`hair_colour_id`
	LEFT JOIN race ON race.`id` = superhero.`race_id`
	LEFT JOIN publisher ON publisher.`id` = superhero.`publisher_id`
	LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
	WHERE superhero.`race_id` = _rice_id
			AND superhero.`gender_id` = _gender_id
			AND superhero.`alignment_id` = _aligement_id
	ORDER BY superhero.`id`;
END $$

DELIMITER $$
CREATE PROCEDURE spu_grafico()
BEGIN
	SELECT
			CASE
					WHEN alignment.`alignment` IS NULL THEN 'Ninguno'
					WHEN alignment.`alignment` IS NOT NULL THEN alignment.`alignment`
			END 'alignment',
					COUNT(superhero.`id`) 'total'
		FROM superhero
		LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
		GROUP BY alignment.`alignment`;
END $$

-- Ejercicio 1
DELIMITER $$
CREATE PROCEDURE spu_buenos_malos
(
IN _publisher_id INT
)
BEGIN	
	SELECT publisher.`publisher_name` 'publisher_name', alignment.`alignment` 'alignment', COUNT(superhero.`alignment_id`) 'total'
	FROM superhero
	LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
	LEFT JOIN publisher ON publisher.`id` = superhero.`publisher_id`
	WHERE superhero.`publisher_id` = _publisher_id  AND (superhero.`alignment_id` = 1 OR superhero.`alignment_id` = 2)
	GROUP BY publisher.`publisher_name`, alignment.`alignment`;
END $$

-- Ejercicio 2
DELIMITER $$
CREATE PROCEDURE spu_colores_ojos()
BEGIN
	SELECT publisher.`publisher_name` 'publisher_name', colour.`colour` 'colour',COUNT(superhero.`id`) 'total'
		FROM superhero
		INNER JOIN colour ON  colour.`id` = superhero.`eye_colour_id`
		INNER JOIN publisher ON publisher.`id` = superhero.`publisher_id`
		WHERE publisher_id = 4 OR publisher_id = 13  -- 4 dc ; 13 marvel comic
		GROUP BY  colour.`colour`, publisher_name;
END $$

-- Ejercicio 3
DELIMITER $$
CREATE PROCEDURE spu_buenos_malos_id_especifico()
BEGIN
	SELECT publisher.`publisher_name` 'publisher_name',
		CASE 
			WHEN alignment.`alignment` IS NULL THEN 'Ninguno'
			WHEN alignment.`alignment` IS NOT NULL THEN alignment.`alignment`
		END 'alignment',
			COUNT(superhero.`id`) 'total'
		FROM superhero
		LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
		LEFT JOIN publisher ON publisher.`id` = superhero.`publisher_id`
		WHERE superhero.`publisher_id` = 2 OR superhero.`publisher_id` = 5 OR
			superhero.`publisher_id` = 11 OR superhero.`publisher_id` = 18 OR
			superhero.`publisher_id` = 24
		GROUP BY alignment.`alignment`, publisher.`publisher_name`
		ORDER BY publisher.`publisher_name`;
END $$



-- Ejercicio 4
DELIMITER $$
CREATE PROCEDURE spu_generos()
BEGIN
	SELECT 
		CASE 	
			WHEN alignment.`alignment` IS NULL THEN 'ninguno'
			WHEN alignment.`alignment` IS NOT NULL THEN alignment.`alignment`
		END 'alignment', gender.`gender`, COUNT(superhero.id)
		FROM superhero
		INNER JOIN gender ON gender.`id` = superhero.`gender_id`
		LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
		GROUP BY alignment.`alignment`, gender.`gender`;
END $$

-- Ejercicio 5
DELIMITER $$
CREATE PROCEDURE spu_total_super()
BEGIN
	
END $$

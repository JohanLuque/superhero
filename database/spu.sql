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
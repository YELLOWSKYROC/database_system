e(i).
		SELECT DISTINCT student.name FROM student
	    INNER JOIN takes ON student.ID = takes.ID
	    WHERE takes.course_id LIKE 'CS%';



e(ii).   
        SELECT student.ID, student.name FROM takes
    	INNER JOIN student ON takes.ID = student.ID
    	WHERE grade = 'F';



e(iii).
	    SELECT dept_name, MAX(salary) AS max_salary
        FROM instructor
        GROUP BY dept_name;



e(iv).
		SELECT DISTINCT course.title, student.name FROM section
		NATURAL JOIN takes
		INNER JOIN course ON section.course_id = course.course_id
		INNER JOIN student ON takes.ID = student.ID
		INNER JOIN time_slot ON section.time_slot_id = time_slot.time_slot_id
		WHERE time_slot.day ='F'
		AND time_slot.start_hour >12
		AND course.course_id 
		IN (SELECT course_id FROM takes 
		    GROUP BY course_id 
		    HAVING COUNT(course_id) >= 2);



e(v).
		SELECT DISTINCT instructor.name, teaches.course_id FROM teaches
		INNER JOIN section ON section.course_id = teaches.course_id
		INNER JOIN instructor ON instructor.ID = teaches.ID
		AND section.room_no IN (
		SELECT classroom.room_no FROM classroom
		INNER JOIN section ON section.room_no = classroom.room_no
		where capacity > 50);
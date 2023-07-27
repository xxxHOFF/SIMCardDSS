----------------A----------------------
SELECT tt.tt_number AS "номер заявки",
       u.name       AS "имя пользователя",
       tt.work_time AS "время отработки",
       s.name       AS "название статуса"
FROM TroubleTickets AS tt
         JOIN
     Users AS u ON tt.user_id = u.id
         JOIN
     TTStatus AS s ON tt.tt_status = s.id
WHERE tt.work_time > '2020-12-02 12:00:00'
ORDER BY tt.work_time ASC;
--------------------------------------------

----------------B------------------------
SELECT tt.tt_number AS "номер заявки",
       u.name       AS "имя пользователя",
       tt.work_time AS "время отработки",
       s.name       AS "название статуса"
FROM TroubleTickets AS tt
         JOIN
     Users AS u ON tt.user_id = u.id
         JOIN
     TTStatus AS s ON tt.tt_status = s.id
WHERE u.name = 'Петрова Мария'
  AND s.name = 'ожидание';
------------------------------------------

----------------------C---------------------------
SELECT tt.tt_number AS "номер заявки",
       u.name       AS "имя пользователя",
       tt.work_time AS "время отработки",
       s.name       AS "название статуса"
FROM TroubleTickets AS tt
         JOIN
     Users AS u ON tt.user_id = u.id
         JOIN
     TTStatus AS s ON tt.tt_status = s.id
WHERE u.name LIKE 'Иванов'
  AND s.name = 'ожидание'
ORDER BY tt.work_time DESC;
-----------------------------------------------------

------------------D-------------------------------------
SELECT DATE_FORMAT(tt.work_time, '%d-%m-%Y') AS "дата",
       s.name                                AS "название статуса",
       COUNT(tt.tt_number)                   AS "количество заявок"
FROM TroubleTickets AS tt
         JOIN
     TTStatus AS s ON tt.tt_status = s.id
WHERE s.name IN ('открыта', 'ожидание')
  AND tt.work_time BETWEEN '2020-12-02 00:00:00' AND '2020-12-04 23:59:59'
GROUP BY DATE_FORMAT(tt.work_time, '%d-%m-%Y'), s.name
ORDER BY DATE_FORMAT(tt.work_time, '%d-%m-%Y');
--------------------------------------------------------

--------------------------E------------------------------
SELECT u.name              AS "имя пользователя",
       COUNT(tt.tt_number) AS "количество заявок"
FROM Users AS u
         LEFT JOIN
     TroubleTickets AS tt ON u.id = tt.user_id
         LEFT JOIN
     TTStatus AS s ON tt.tt_status = s.id
WHERE s.name = 'открыта'
GROUP BY u.name
ORDER BY u.name;
------------------------------------------------------
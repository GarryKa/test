SELECT
    login, COUNT(*) AS CountOf
    FROM Users
    GROUP BY login
    HAVING COUNT(*) > 1
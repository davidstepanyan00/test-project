
-- 1. Выборка пользователей, у которых количество постов больше, чем у пользователя, их пригласившего:

SELECT u1.*
FROM users u1
JOIN users u2 ON u1.invited_by_user_id = u2.id
WHERE u1.posts_qty > u2.posts_qty;
--2. Выборка пользователей, имеющих максимальное количество постов в своей группе:

SELECT u.*
FROM users u
JOIN (
SELECT group_id, MAX(posts_qty) AS max_posts
FROM users
GROUP BY group_id
) max_posts_per_group ON u.group_id = max_posts_per_group.group_id
WHERE u.posts_qty = max_posts_per_group.max_posts;

--3. Выборка групп, количество пользователей в которых превышает 10000:

SELECT g.*
FROM groups g
JOIN (
SELECT group_id, COUNT(*) AS user_count
FROM users
GROUP BY group_id
) user_counts ON g.id = user_counts.group_id
WHERE user_counts.user_count > 10000;

--4.Выборка пользователей, у которых пригласивший их пользователь из другой группы:

SELECT u.*
FROM users u
JOIN users inviter ON u.invited_by_user_id = inviter.id
WHERE u.group_id <> inviter.group_id;

--5. Выборка групп с максимальным количеством постов у пользователей:

SELECT g.*
FROM groups g
JOIN (
SELECT group_id, SUM(posts_qty) AS total_posts
FROM users
GROUP BY group_id
) group_posts ON g.id = group_posts.group_id
WHERE group_posts.total_posts = (
SELECT MAX(total_posts)
FROM (
SELECT SUM(posts_qty) AS total_posts
FROM users
GROUP BY group_id
) max_posts_per_group
);


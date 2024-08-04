-- Q.1
SELECT
    episodes.episode_title AS 'エピソードタイトル',
    SUM(schedule.view) AS '視聴数'
FROM
    schedule
    JOIN episodes ON schedule.episode_id = episodes.episode_id
GROUP BY
    episodes.episode_title
ORDER BY
    SUM(schedule.view) DESC
LIMIT
    3;

-- Q.2
SELECT
    programs.program_title AS '番組タイトル',
    episodes.season AS 'シーズン数',
    episodes.episode_no AS 'エピソード数',
    episodes.episode_title AS 'エピソードタイトル',
    SUM(schedule.view) AS '視聴数'
FROM
    schedule
    INNER JOIN episodes ON schedule.episode_id = episodes.episode_id
    INNER JOIN programs ON episodes.program_id = programs.program_id
GROUP BY
    programs.program_title,
    episodes.season,
    episodes.episode_no,
    episodes.episode_title
ORDER BY
    SUM(schedule.view) DESC
LIMIT
    3;

-- Q.3
SELECT
    channels.channel_name AS 'チャンネル名',
    schedule.start_time AS '放送開始時刻(日付+時間)',
    schedule.end_time AS '放送終了時刻',
    episodes.season AS 'シーズン数',
    episodes.episode_no AS 'エピソード数',
    episodes.episode_title AS 'エピソードタイトル',
    episodes.episode_ex AS 'エピソード詳細'
FROM
    schedule
    INNER JOIN channels ON schedule.channel_id = channels.channel_id
    INNER JOIN episodes ON schedule.episode_id = episodes.episode_id
WHERE
    DATE (schedule.start_time) = CURRENT_DATE;

-- Q.4
SELECT
    schedule.start_time AS '放送開始時刻',
    schedule.end_time AS '放送終了時刻',
    episodes.season AS 'シーズン数',
    episodes.episode_no AS 'エピソード数',
    episodes.episode_title AS 'エピソードタイトル',
    episodes.episode_ex AS 'エピソード詳細'
FROM
    schedule
    INNER JOIN channels ON schedule.channel_id = channels.channel_id
    INNER JOIN episodes ON schedule.episode_id = episodes.episode_id
WHERE
    channels.channel_name = 'ドラマ'
    AND schedule.start_time BETWEEN CURRENT_DATE AND DATEADD  (CURRENT_DATE, INTERVAL 7 DAY);

-- Q.5
SELECT
    programs.program_title AS '番組タイトル',
    SUM(schedule.view) AS '視聴数'
FROM
    schedule
    INNER JOIN episodes ON schedule.episode_id = episodes.episode_id
    INNER JOIN programs ON episodes.program_id = programs.program_id
WHERE
    schedule.start_time BETWEEN DATE_SUB (CURRENT_DATE, INTERVAL 7 DAY) AND CURRENT_DATE
GROUP BY
    programs.program_title
ORDER BY
    SUM(schedule.view) DESC
LIMIT
    2;

-- Q.6
SELECT
    averages.category_name AS 'ジャンル名',
    averages.program_title AS '番組タイトル',
    MAX(average_views) AS 'エピソード平均視聴数'
FROM
    (
        SELECT
            episodes.episode_id,
            categories.category_name,
            programs.program_title,
            AVG(schedule.view) AS average_views
        FROM
            schedule
            INNER JOIN episodes ON schedule.episode_id = episodes.episode_id
            INNER JOIN programs ON episodes.program_id = programs.program_id
            INNER JOIN program_categories ON programs.program_id = program_categories.program_id
            INNER JOIN categories ON program_categories.category_id = categories.category_id
        GROUP BY
            episodes.episode_id,
            categories.category_name,
            programs.program_title
    ) AS averages
GROUP BY
    averages.category_name,
    averages.program_title;
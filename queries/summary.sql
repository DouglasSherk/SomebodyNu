# counts only
select (select count(*) from analytics left join users on genus=users.id left join activities on kingdom=activities.id where counter="matches") as "2-person queue entry",
       (select count(*) from analytics left join users on genus=users.id left join activities on kingdom=activities.id where counter="groupmatch") as "n-person queue entry",
       (select count(*) from analytics left join users u1 on kingdom=u1.id left join users u2 on genus=u2.id left join activities on class=activities.id where counter="partial") as "2 people matched",
       (select count(*) from analytics left join activities on kingdom=activities.id where counter="groupfilled") as "n people matched";

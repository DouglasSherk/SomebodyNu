# n people matched
select analytics.id, class as "Users", family as "Group", activities.name as "Activity", phylum as "Location", analytics.time as "Date"
       from analytics
       left join activities on kingdom=activities.id
       where counter="groupfilled";

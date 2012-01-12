<?php
class Queue {
    /**
     * An activity object which has name and any other information.
     */
    public static $activity;

    /**
     * An array of users already in the queue. (for now, can only ever be 1)
     */
    public static $users;

    /**
     * Location of the queue; an activity can happen anywhere but a queue is a
     * list of everyone who can be potentially matched with each other.
     */
    public static $location;
}

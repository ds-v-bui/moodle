<?php

/////////////////////////////////////////////////////////////////////////////
//                                                                         //
// NOTICE OF COPYRIGHT                                                     //
//                                                                         //
// Moodle - Calendar extension                                             //
//                                                                         //
// Copyright (C) 2003-2004  Greek School Network            www.sch.gr     //
//                                                                         //
// Designed by:                                                            //
//     Avgoustos Tsinakos (tsinakos@teikav.edu.gr)                         //
//     Jon Papaioannou (pj@moodle.org)                                     //
//                                                                         //
// Programming and development:                                            //
//     Jon Papaioannou (pj@moodle.org)                                     //
//                                                                         //
// For bugs, suggestions, etc contact:                                     //
//     Jon Papaioannou (pj@moodle.org)                                     //
//                                                                         //
// The current module was developed at the University of Macedonia         //
// (www.uom.gr) under the funding of the Greek School Network (www.sch.gr) //
// The aim of this project is to provide additional and improved           //
// functionality to the Asynchronous Distance Education service that the   //
// Greek School Network deploys.                                           //
//                                                                         //
// This program is free software; you can redistribute it and/or modify    //
// it under the terms of the GNU General Public License as published by    //
// the Free Software Foundation; either version 2 of the License, or       //
// (at your option) any later version.                                     //
//                                                                         //
// This program is distributed in the hope that it will be useful,         //
// but WITHOUT ANY WARRANTY; without even the implied warranty of          //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the           //
// GNU General Public License for more details:                            //
//                                                                         //
//          http://www.gnu.org/copyleft/gpl.html                           //
//                                                                         //
/////////////////////////////////////////////////////////////////////////////

/**
 * Display the calendar page.
 * @copyright 2003 Jon Papaioannou
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @package core_calendar
 */

require_once('../config.php');
require_once($CFG->dirroot.'/course/lib.php');
require_once($CFG->dirroot.'/calendar/lib.php');

$courseid = optional_param('course', SITEID, PARAM_INT);
$view = optional_param('view', 'upcoming', PARAM_ALPHA);
$time = optional_param('time', 0, PARAM_INT);

$url = new moodle_url('/calendar/view.php');

if (empty($time)) {
    $time = time();
}

if ($courseid != SITEID) {
    $url->param('course', $courseid);
}

if ($view !== 'upcoming') {
    $time = usergetmidnight($time);
    $url->param('view', $view);
}

$url->param('time', $time);

$PAGE->set_url($url);

if ($courseid != SITEID && !empty($courseid)) {
    // Course ID must be valid and existing.
    $course = $DB->get_record('course', array('id' => $courseid), '*', MUST_EXIST);
    $courses = array($course->id => $course);
    $issite = false;
    navigation_node::override_active_url(new moodle_url('/course/view.php', array('id' => $course->id)));
} else {
    $course = get_site();
    $courses = calendar_get_default_courses();
    $issite = true;
}

require_login($course, false);

$calendar = new calendar_information(0, 0, 0, $time);
$calendar->prepare_for_view($course, $courses);

$pagetitle = '';

$strcalendar = get_string('calendar', 'calendar');

switch($view) {
    case 'day':
        $PAGE->navbar->add(userdate($time, get_string('strftimedate')));
        $pagetitle = get_string('dayviewtitle', 'calendar', userdate($time, get_string('strftimedaydate')));
    break;
    case 'month':
        $PAGE->navbar->add(userdate($time, get_string('strftimemonthyear')));
        $pagetitle = get_string('detailedmonthviewtitle', 'calendar', userdate($time, get_string('strftimemonthyear')));
    break;
    case 'upcoming':
        $pagetitle = get_string('upcomingevents', 'calendar');
    break;
}

// Print title and header
$PAGE->set_pagelayout('standard');
$PAGE->set_title("$course->shortname: $strcalendar: $pagetitle");
$PAGE->set_heading($COURSE->fullname);

$renderer = $PAGE->get_renderer('core_calendar');
$calendar->add_sidecalendar_blocks($renderer, true, $view);

echo $OUTPUT->header();
echo $renderer->start_layout();
echo html_writer::start_tag('div', array('class'=>'heightcontainer'));
echo $OUTPUT->heading(get_string('calendar', 'calendar'));

if ($view == 'day' || $view == 'upcoming') {
    switch($view) {
        case 'day':
            list($data, $template) = calendar_get_view($calendar, $view);
            echo $renderer->render_from_template($template, $data);
        break;
        case 'upcoming':
            $defaultlookahead = CALENDAR_DEFAULT_UPCOMING_LOOKAHEAD;
            if (isset($CFG->calendar_lookahead)) {
                $defaultlookahead = intval($CFG->calendar_lookahead);
            }
            $lookahead = get_user_preferences('calendar_lookahead', $defaultlookahead);

            $defaultmaxevents = CALENDAR_DEFAULT_UPCOMING_MAXEVENTS;
            if (isset($CFG->calendar_maxevents)) {
                $defaultmaxevents = intval($CFG->calendar_maxevents);
            }
            $maxevents = get_user_preferences('calendar_maxevents', $defaultmaxevents);
            echo $renderer->show_upcoming_events($calendar, $lookahead, $maxevents);
        break;
    }
} else if ($view == 'month') {
    list($data, $template) = calendar_get_view($calendar, $view);
    echo $renderer->render_from_template($template, $data);
}
echo html_writer::end_tag('div');

list($data, $template) = calendar_get_footer_options($calendar);
echo $renderer->render_from_template($template, $data);

echo $OUTPUT->footer();

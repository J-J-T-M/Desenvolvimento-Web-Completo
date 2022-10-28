<?php
    require "dashboard.model.php";
    require "dashboard.service.php";
    require "connection.php";

    // logica do script

    $dashboard = new Dashboard();
    $connection = new Connection();
    $dashboardservice = new DashboardService($connection, $dashboard);

    $competence = explode('-',$_GET['competence']);
    $year = $competence[0];
    $month = $competence[1];

    $days_of_the_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    $dashboard->__set('date_start', $year.'-'.$month.'-01');
    $dashboard->__set('date_end', $year.'-'.$month.'-'.$days_of_the_month);

    $dashboard->__set('salesNumbers',$dashboardservice->getSalesNumbers());
    $dashboard->__set('salesAmount',$dashboardservice->getSalesAmount());
    $dashboard->__set('activeClients',$dashboardservice->getactiveClients());
    $dashboard->__set('inactivesClients',$dashboardservice->getinactivesClients());
    $dashboard->__set('totalComplaints',$dashboardservice->gettotalComplaints());
    $dashboard->__set('totalOfPraise',$dashboardservice->gettotalOfPraise());
    $dashboard->__set('totalOfSuggestions',$dashboardservice->gettotalOfSuggestions());
    $dashboard->__set('totalExpenses',$dashboardservice->gettotalExpenses());

    // echo'<pre>';
    // print_r($dashboardservice);
    // echo '</pre>';

    echo json_encode($dashboard);
   


?>
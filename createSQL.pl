#!/usr/bin/perl
use strict;
use warnings;

use List::Util::WeightedChoice qw( choose_weighted );
my $choices = ['1', '2', '3'];
my $weights = [ 50, 30, 15] ;

my $max = 150;
my $count = 1;

while ($max >= $count) {

    my $first_date = 1385856000;
    my $range_date = 1641600;

    my $component_id = int(rand(5)) + 1;
    #my $status_id = int(rand(3)) + 1;
    my $status_id = choose_weighted( $choices, $weights );
    my $build_num = int(rand(300)) + 1;
    my $created = int(rand($range_date)) + $first_date;
    my $dur = "";
    my $duration = "";
    my $cov = "";
    my $coverage = "";


    if ($status_id eq 1) {
        $dur = rand(120);
        $duration = sprintf("%.2f", $dur);
        $cov = rand(75) + 20;
        $coverage = sprintf("%.2f", $cov); 
    }
    elsif ($status_id eq 2) {
        $dur = rand(60);
        $duration = sprintf("%.2f", $dur);
        $cov = rand(60) + 20;
        $coverage = sprintf("%.2f", $cov);    
    }
    else {
        $dur = rand(20);
        $duration = sprintf("%.2f", $dur);
        $cov = rand(40) + 20;
        $coverage = sprintf("%.2f", $cov); 
    }
    
    my $job_name = "";

    if ($component_id == 1) {
        $job_name = "Client_2013_12";
    }
    elsif ($component_id == 2) {
        $job_name = "Mobile_2013_12";
    }
    elsif ($component_id == 3) {
        $job_name = "Common_2013_12";
    }
    elsif ($component_id == 4) {
        $job_name = "Billing_2013_12";
    }
    else {
        $job_name = "Policy_2013_12";
    }


    printf "
    \nINSERT INTO builds\n\t(component_id, status_id, build_num, created, duration, job_name, coverage)\nVALUES\n\t($component_id, $status_id, $build_num, $created, $duration, '$job_name', $coverage);\n";

    $count++;
}

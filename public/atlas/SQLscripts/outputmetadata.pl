#!/usr/bin/perl

# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
# - - - - - - - - - - - - - - - - - H E A D E R - - - - - - - - - - - - - - - - - - -
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

# MANUAL FOR outputmetadata.pl

=pod

=head1 NAME

$0 -- Save all the metadata information from the database : transcriptatlas

=head1 SYNOPSIS

outputmetadata.pl [--help] [--manual]

=head1 OPTIONS

=over 3

=item B<-1, -a, in>

List of libraries numbers separated by comma (e.g 123,975).  (Required)

=item B<-2, --b, -out>

Output file name  (Required)

=item B<-h, --help>

Displays the usage message.  (Optional) 

=item B<-man, --manual>

Displays full manual.  (Optional) 

=back

=head1 DEPENDENCIES

Requires the following Perl libraries (all standard in most Perl installs).
   DBI
   Getopt::Long
   Pod::Usage

=head1 AUTHOR

Written by Modupe Adetunji, 
Animal and Food Sciences Department, University of Delaware.

=head1 REPORTING BUGS

Report bugs to amodupe@udel.edu

=head1 COPYRIGHT

Copyright 2015 MOA.  

=cut

# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
# - - - - - - - - - - - - - - U S E R  V A R I A B L E S- - - - - - - - - - - - - - -
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

# CODE FOR genelistquery.pl

use strict;
use DBI;
use Getopt::Long;
use Pod::Usage;

#ARGUMENTS
my($specifics,$output1,$output2,$help,$manual);
GetOptions(
				"1|a|in|in1|list=s"	=>	\$specifics,
				"2|b|out1|output1=s"        =>      \$output1,
				"h|help"        =>      \$help,
				"man|manual"	=>      \$manual );

# VALIDATE ARGS
pod2usage( -verbose => 2 )  if ($manual);
pod2usage( -verbose => 1 )  if ($help);


# DATABASE ATTRIBUTES
my $dsn = 'dbi:mysql:transcriptatlas';
my $user = 'frnakenstein';
my $passwd = 'maryshelley';

# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
# - - - - - - - - - - - - G L O B A L  V A R I A B L E S- - - - - - - - - - - - - -
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

# DATABASE VARIABLES
my ($dbh, $sth, $syntax, @row);

# CONNECT TO THE DATABASE
#open (OUT,">/home/modupe/genelist.txt");
$dbh = DBI->connect($dsn, $user, $passwd) or die "Connection Error: $DBI::errstr\n";
#TABLE COLUMNS
my ($gene_id, $chrom_no, $chrom_start, $chrom_stop, $fpkm);
my ($fpkm_conf_low, $fpkm_conf_high, $library_id);

#EMPTY SPACES COUNTER
my $no = 0;
#HASH TABLES
my (%CHROM, %FPKM, %GENES);

# OPENING OUTPUT FILE
open (OUT, ">$output1");


#SPECIFYING LIBRARIES OF INTEREST
my @headers = split("\,", $specifics);

# HEADER print out
print OUT "library_id\tbird_id\tspecies\tline\ttissue\tmethod\t";
print OUT "index\tchip_result\tscientist\tdate\tnotes\n";
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
# - - - - - - - - - - - - - - - - M A I N  W O R K F L O W - - - - - - - - - - - - - -
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

#TABLE COLUMNS
#gene_short_name, chrom_no, chrom_start, chrom_stop, fpkm, library_id
$syntax = "select * from bird_libraries where library_id in 
	($specifics);";
$sth = $dbh->prepare($syntax);
$sth->execute or die "SQL Error: $DBI::errstr\n";

while (@row = $sth->fetchrow_array() ) { 
	foreach my $real (0..$#row-1){
        print OUT "$row[$real]\t";
      }
      print OUT "$row[$#row]\n";
}
# DISCONNECT FROM THE DATABASE
$dbh->disconnect();
close(OUT);

# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
# - - - - - - - - - - - - - - - - -T H E  E N D - - - - - - - - - - - - - - - - - - -
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
exit;

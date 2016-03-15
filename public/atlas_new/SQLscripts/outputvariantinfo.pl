#!/usr/bin/perl

# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
# - - - - - - - - - - - - - - - - - H E A D E R - - - - - - - - - - - - - - - - - - -
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

# MANUAL FOR genelistquery.pl

=pod

=head1 NAME

$0 -- Extract genes information from specified library_id in the mysql database : transcriptatlas

=head1 SYNOPSIS

genelistquery.pl [--help] [--manual]

 
=head1 OPTIONS

=over 3

=item B<-1, -a, in>

List of libraries numbers separated by comma (e.g 123,975).  (Required)

=item B<-2, --b, -out>

Output1 .  (Optional)

=item B<-h, --help>

Displays the usage message.  (Optional) 

=item B<-man, --manual>

Displays full manual.  (Optional) 

=back

=head1 DEPENDENCIES

Requires the following Perl libraries (all standard in most Perl installs).
   DBI
   DBD::mysql
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
my($gene,$begin,$species,$end,$chrom, $output,$help,$manual);
GetOptions(
				"1|g|in1|gene=s"	=>	\$gene,
                        "2|b|in2|begin=s"	=>	\$begin,
                        "3|e|in3|end=s"	=>	\$end,
                        "4|s|in4|species=s"	=>	\$species,
                        "5|c|in5|chrom=s"	=>	\$chrom,
                        "6|o|out|output=s"	=>	\$output,
                        "h|help"	=>      \$help,
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
my ($dbh, $sth, $syntax);

# CONNECT TO THE DATABASE
#open (OUT,">/home/modupe/genelist.txt");
$dbh = DBI->connect($dsn, $user, $passwd) or die "Connection Error: $DBI::errstr\n";

#HASH TABLES
my (%CHROM, %FPKM, %GENES);

# OPENING OUTPUT FILE


# HEADER print out

# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
# - - - - - - - - - - - - - - - - M A I N  W O R K F L O W - - - - - - - - - - - - - -
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

#TABLE COLUMNS
#gene_short_name, chrom_no, chrom_start, chrom_stop, fpkm, library_id
if ($species =~ /gallus/) {
  if ($chrom) {
    $syntax = "call usp_varchrom(\"".$species."\",\"".$chrom."\",\"".$begin."\",\"".$end."\")";
  }
  elsif($gene) {  
    $syntax = "call usp_vargene(\"".$species."\",\"".$gene."\")";
  }
  $sth = $dbh->prepare($syntax);
  $sth->execute or die "SQL Error: $DBI::errstr\n";
 
  while (my ($line, $chrom, $position, $ref, $alt, $class, $ann, $genename, $dbsnp) = $sth->fetchrow_array() ) { 
	$line = uc($line);
      if(length($dbsnp) <1){$dbsnp = "-";}
      $GENES{$line}{$chrom}{$position} = "$ref|$alt|$class|$ann|$genename|$dbsnp";
  }
  print "<table class=\"gened\">
        <tr>
          <th class=\"gened\">Chrom</th>
          <th class=\"gened\">Position</th>
          <th class=\"gened\">Ref</th>
          <th class=\"gened\">Alt</th>
          <th class=\"gened\">Class</th>
          <th class=\"gened\">Annotation</th>
          <th class=\"gened\">Gene Name</th>
          <th class=\"gened\">dbSNP</th>
        </tr>\n";
  foreach my $a (keys %GENES){
    print "<tr>
          <th class=\"geneds\" colspan=100%>$a</th></tr>\n";
    foreach my $b (sort keys % {$GENES{$a} }){
      foreach my $c (sort keys % {$GENES{$a}{$b} }){
        my @all = split('\|', $GENES{$a}{$b}{$c}, 6);
        print "<tr><td class=\"gened\"><b>$b</b></td><td class=\"gened\"><b>$c</b></td>";
        foreach my $ii (0..$#all){
          print "<td class=\"gened\">$all[$ii]</td>";
        }
        print "</tr>\n";
      }
    }
  }
  print "</table>\n";
}
else {
  if ($chrom) {
    $syntax = "call usp_varchromless(\"".$species."\",\"".$chrom."\",\"".$begin."\",\"".$end."\")";
  }
  elsif($gene) {  
    $syntax = "call usp_vargeneless(\"".$species."\",\"".$gene."\")";
  }
  $sth = $dbh->prepare($syntax);
  $sth->execute or die "SQL Error: $DBI::errstr\n";
 
  while (my ($chrom, $position, $ref, $alt, $class, $ann, $genename, $dbsnp) = $sth->fetchrow_array() ) { 
	if(length($dbsnp) <1){$dbsnp = "-";} 
      $GENES{$chrom}{$position} = "$ref|$alt|$class|$ann|$genename|$dbsnp";
  }
  print "<table class=\"gened\">
        <tr>
          <th class=\"gened\">Chrom</th>
          <th class=\"gened\">Position</th>
          <th class=\"gened\">Ref</th>
          <th class=\"gened\">Alt</th>
          <th class=\"gened\">Class</th>
          <th class=\"gened\">Annotation</th>
          <th class=\"gened\">Gene Name</th>
          <th class=\"gened\">dbSNP</th>
        </tr>\n"; 
  foreach my $a (keys %GENES){
    foreach my $b (sort keys % {$GENES{$a} }){
      my @all = split('\|', $GENES{$a}{$b}, 6);
      print "<tr><td class=\"gened\"><b>$a</b></td><td class=\"gened\"><b>$b</b></td>";
      foreach my $ii (0..$#all){
        print "<td class=\"gened\">$all[$ii]</td>";
      }
      print "</tr>\n";
    }        
  }
print "</table>\n";
}

# DISCONNECT FROM THE DATABASE
$sth->finish();
$dbh->disconnect();

# DISCONNECT FROM THE DATABASE
$sth->finish();
$dbh->disconnect();

# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
# - - - - - - - - - - - - - - - - -T H E  E N D - - - - - - - - - - - - - - - - - - -
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
exit;

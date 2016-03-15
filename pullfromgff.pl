#!/usr/bin/perl
open(IN,"<",$ARGV[0]) or die "$ARGV[0] can't open";
open (OUT, ">", $ARGV[1]);
while (<IN>){
	chomp;
	@all = split("\t", $_);
	if($all[2] =~ /gene/){
		foreach my $i (0..$#all-1){
			print OUT "$all[$i]\t";
		}
		print OUT "$all[$#all]\n";
	}
}

close(OUT);

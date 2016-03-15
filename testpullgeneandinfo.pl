#!/usr/bin/perl
open(IN,"<",$ARGV[0]) or die "$ARGV[0] can't open";
open (OUT, ">", $ARGV[1]);
while (<IN>){
	chomp;
	@all = split("\t", $_);
	@newall = split("\;", $all[8]);
	foreach my $abc (@newall){
		if ($abc =~ /^gene=.*/){
			@bcd = split("\=",$abc,2);
			print OUT "$all[2]\t$all[6]\t$bcd[1]\t$all[0]\t$all[3]\t$all[4]\n";
		}
	}
}
close(OUT);

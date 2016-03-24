#!/usr/bin/perl
open(IN,"<",$ARGV[0]) or die "$ARGV[0] can't open";
open (OUT, ">", $ARGV[1]);
print OUT "Protein\tBeg\tEnd\tReference\n";
while (<IN>){
	chomp;
	@all = split("\t", $_);
	@newall = split("\;", $all[8]);
	foreach my $abc (@newall){
		if ($abc =~ /^gene=.*/){
			@bcd = split("\=",$abc,2);
			if ($all[6] =~ /\+/){
				print OUT "$bcd[1]\t$all[3]\t$all[4]\t$all[0]\n";
			}
			else {
				print OUT "$bcd[1]\t$all[4]\t$all[3]\t$all[0]\n";
			}
		}
	}
}
close(OUT);

#!/usr/bin/perl
open (IN1, "<$ARGV[0]");
while (<IN1>){
	chomp;
	$oldword = substr($_,1,-1);
	$word = uc($oldword);
	if (exists $ONE{$word}) {
		$ONE{$word} = $ONE{$word}+1;
		$TWO{$word} = "$TWO{$word},$oldword";
	}
	else {
		$ONE{$word} = 1;
		$TWO{$word} = $oldword;
	}
}
foreach my $real (keys %ONE){
	if ($ONE{$real} > 1){
		print $real."\t".$ONE{$real}."\t".$TWO{$real}."\n";
	}
}

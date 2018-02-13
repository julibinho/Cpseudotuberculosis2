

for ORG in *.faa;
do
	echo $ORG;
   perl ~/projects/actives/CLADE/27/scripts/application/formatDatabase.pl -sp_name ${ORG} -database ${ORG} -outputFile ${ORG}.ftt -taxonCode 1087452

    
done

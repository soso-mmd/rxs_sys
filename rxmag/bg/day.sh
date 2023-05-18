#!/bin/bash
date=$(date +%Y%m%d_%H%M%S)
echo "start:$date\n"
curl http://rxmag.com/bg/cutCmt.php	 > /home/rxs/rxmag/bg/log/$date.cmt	
curl http://rxmag.com/bg/upOrder.php > /home/rxs/rxmag/bg/log/$date.ord
date2=$(date +%Y%m%d_%H%M%S)
echo "end:$date2\n"
                <div class="col-sm-3" style="background-color: #ffff;">
                    <a class="twitter-timeline"
                            data-width="400"
                            data-height="700"
                            data-theme="light"
                            <?php if($_SESSION['type']==='F')
                               echo "href='https://twitter.com/Banasthali_Vid?ref_src=twsrc%5Etfw' > Tweets by Banasthali_Vid";
                            else
                               echo "href='https://twitter.com/BleepinComputer?ref_src=twsrc%5Etfw'>Tweets by BleepinComputer";  ?>>

                    </a>

                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8">
                    </script>

                </div>

            </div>
        </div>
      
    </body>
</html>

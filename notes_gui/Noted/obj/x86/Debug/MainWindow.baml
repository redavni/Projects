   M S B A M L   `   `   `  ����@  <Noted, Version=1.0.0.0, Culture=neutral, PublicKeyToken=null-clr-namespace:Noted.ClassesNoted.Classes  5   	       Noted.MainWindow   5   	   \ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   -localclr-namespace:Noted.Classes     5   	     � Title$  Noted��5   	   $	��600��6   $	��800��6$   .��5      ]� -   5        $��
dockPanel1��5      ��. .+�5   
   �� -   5        $��labelStatus��5   6   $��Status Bar Text��6   $��28��6*   $��Bottom=�6I   ���	#FFD1D1D1$��0,1,0,0q�6y   ��5      �� 5	       �� EndPoint$ 0.5,1&�6&    �� 
StartPoint$ 0.5,0&�67   .��5
      �  � Color$ 	#FFD4D4D4��6#    � Offset$ 1Q�65   � 5      $ White��6#   $ 0Q�61   � 5      $ 	#FFE5E2E2��6#   $
 0.09Q�65   5      5      o� 5   
   -   5        $��mainMenuBar��5      $	��Top=�6"   $��23��67   ��5      �� 5      $ 0.5,1&�6&   $ 0.5,0&�67   .��5      � $ White��6#   $ 0Q�61   � 5      $ 	#FFE5E5E5��6#   $ 1Q�65   5      .@�5      m� $
��File��6   .@�5      m� -   5        $	��New��5      6(   m� 5      $
��Open��6   m� 5      $
��Save��6   �� 5      m� 5      -   5        $
��Exit��5      6)   5      5      ]� 5   
   -   5        $��
dockPanel2��5      ��. .+�5       R� -   5        $��treeViewFiles��5       $	��180��6,   $��0q�68   $��0,0,1,0q�6C   
����������	#FFD1D1D1��5!      �� 5"       �� ItemsSource 6/   �� *
Children+.R�5#      �� ��6$   �� *Name+ �� ItemTemplate 5$      �� 5%       �� DataType   Noted.Classes.Note"  6'   .R�5&      �� ��6(   �� *Name+5'      5)      5+      �� 5,      -   5        $��tabControlFiles��5,      $��0q�60    � UseLayoutRounding .  $��0q�6^   5-      5.      5/      50      
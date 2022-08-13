e="xs:string"/>
                </xs:complexType>
              </xs:element>
            </xs:choice>
          </xs:complexType>
        </xs:element>
        <xs:element minOccurs="0" name="Images">
          <xs:complexType>
            <xs:sequence>
              <xs:element minOccurs="0" maxOccurs="unbounded" name="Image">
                <xs:annotation>
                  <xs:documentation>Defines an image that can be referenced by a moniker.</xs:documentation>
                </xs:annotation>
                <xs:complexType>
                  <xs:sequence>
                    <xs:element maxOccurs="unbounded" name="Source">
                      <xs:annotation>
                        <xs:documentation>[Required] [Minimum: 1] Defines a single image source asset.</xs:documentation>
                      </xs:annotation>
                      <xs:complexType>
                        <xs:sequence>
                          <xs:choice minOccurs="0">
                            <xs:element name="Size">
                              <xs:annotation>
                                <xs:documentation>[Optional] The source will be used only for the the given value. (If specified, this must be the first child of the source)</xs:documentation>
                              </xs:annotation>
                              <xs:complexType>
                                <xs:attribute name="Value" use="required" type="ST_PositiveInt"/>
                              </xs:complexType>
                            </xs:element>
                            <xs:element name="SizeRange">
                              <xs:annotation>
                                <xs:documentation>[Optional] The source will be used between the min/max size inclusively. (If specified, this must be the first child of the source)</xs:documentation>
                              </xs:annotation>
                              <xs:complexType>
                                <xs:attribute name="MinSize" use="required" type="ST_PositiveInt"/>
                                <xs:attribute name="MaxSize" use="required" type="ST_PositiveInt"/>
                              </xs:complexType>
                            </xs:element>
                            <xs:element name="Dimensions">
                              <xs:annotation>
                                <xs:documentation>[Optional] The source will be used only for the given width and height. (If specified, this must be the first child of the source)</xs:documentation>
                              </xs:annotation>
                              <xs:complexType>
                                <xs:attribute name="Width" use="required" type="ST_PositiveInt"/>
                                <xs:attribute name="Height" use="required" type="ST_PositiveInt"/>
                              </xs:complexType>
                            </xs:element>
                            <xs:element name="DimensionRange">
                              <xs:annotation>
                                <xs:documentation>[Optional] The source will be used between the min/max width/height inclusively. (If specified, this must be the first child of the source)</xs:documentation>
                              </xs:annotation>
                              <xs:complexType>
                                <xs:attribute name="MinWidth" use="required" type="ST_PositiveInt"/>
                                <xs:attribute name="MinHeight" use="required" type="ST_PositiveInt"/>
                                <xs:attribute name="MaxWidth" use="required" type="ST_PositiveInt"/>
                                <xs:attribute name="MaxHeight" use="required" type="ST_PositiveInt"/>
                              </xs:complexType>
                            </xs:element>
                          </xs:choice>
                          <xs:element minOccurs="0" name="NativeResource">
                            <xs:annotation>
                              <xs:documentation>[Optional] The source is defined in a native assembly with the given resource ID and type. (If a size[range] or dimension[range] is specified for the source, this, if specified, must appear after other child.)</xs:documentation>
                            </xs:annotation>
                            <xs:complexType>
                              <xs:attribute name="ID" use="required" type="ST_IdValue"/>
                              <xs:attribute name="Type" use="required" type="ST_NativeType"/>
                            </xs:complexType>
                          </xs:element>
                        </xs:sequence>
                        <xs:attribute name="Uri" use="required" type="ST_MinLengthString"/>
                        <xs:attribute name="Background" use="optional" type="ST_SourceBackgroundType"/>
                      </xs:complexType>
                    </xs:element>
                  </xs:sequence>
                  <xs:attribute name="Guid" use="required" type="ST_GuidValue"/>
                  <xs:attribute name="ID" use="required" type="ST_IdValue"/>
                  <xs:attribute name="AllowColorInversion" use="optional" type="xs:boolean"/>
                </xs:complexType>
              </xs:element>
            </xs:sequence>
          </xs:complexType>
        </xs:element>
        <xs:element minOccurs="0" name="ImageLists">
          <xs:complexType>
            <xs:sequence>
              <xs:element minOccurs="0" maxOccurs="unbounded" name="ImageList">
                <xs:annotation>
                  <xs:documentation>Defines a collection of images that can be returned in a single image strip.</xs:documentation>
                </xs:annotation>
                <xs:complexType>
                  <xs:sequence>
                    <xs:element maxOccurs="unbounded" name="ContainedImage">
                      <xs:annotation>
                        <xs:documentation>[Required] [Minimum: 1] An image in the image strip. The order in the image list determines the order in the generated image strip.</xs:documentation>
                      </xs:annotation>
                      <xs:complexType>
                        <xs:attribute name="Guid" use="required" type="ST_GuidValue"/>
                        <xs:attribute name="ID" use="required" type="ST_IdValue"/>
                        <xs:attribute name="External" use="optional" type="xs:boolean"/>
                      </xs:complexType>
                    </xs:element>
                  </xs:sequence>
                  <xs:attribute name="Guid" use="required" type="ST_GuidValue"/>
                  <xs:attribute name="ID" use="required" type="ST_IdValue"/>
                </xs:complexType>
              </xs:element>
            </xs:sequence>
          </xs:complexType>
        </xs:element>
      </xs:all>
      <xs:attribute name="PackageGuid" use="optional" type="ST_GuidValue"/>
    </xs:complexType>
  </xs:element>
  
</xs:schema>
���T┼T�J2: K�~��5_�L�d�XMG'5xq���3j[\JG�ѬxH��J�^�T�\����*��YIxً�����@���Ӕ�[{�����&F~�*�{�kki`�>��Q-R�  BSJB         v4.0.30319     l   p   #~  �   �   #Strings    �     #US �     #GUID   �  �   #Blob               �%3                 �                 �             
 9        <   �4     x      <Module> Microsoft.VisualStudio.Setup.Imaging.resources de Microsoft.VisualStudio.Imaging.unlocalizable.g.de.resources Microsoft.VisualStudio.Setup.Imaging.g.de.resources Microsoft.VisualStudio.Setup.Imaging.resources.dll         �!u���O��z����� �� $  �  �      $  RSA1     ��WĮ��.�������j쏇�vl�L���;�����ݚ�6!�r<�����w��wO)�2�����!�����d\L����(]b,�e,��=t]o-��~^�Ė=&�Ce m��4MZғ �          ��                          ��        _CorDllMain mscoree.dll     �%  @                                                                                                                                                                                                                                                                 �                  0  �               	  H   X�  @          @4   V S _ V E R S I O N _ I N F O     ���     , �    �                         D    V a r F i l e I n f o     $    T r a n s l a t i o n     ��   S t r i n g F i l e I n f o   |   0 4 0 7 0 4 b 0   h (  C o m m e n t s   C o n t a i n e r   f � r   I m a g e d i e n s t a b h � n g i g k e i t e n   4 
  C o m p a n y N a m e     M i c r o s o f t   x (  F i l e D e s c r i p t i o n     I m a g e e r s t e l l u n g   f � r   V i s u a l   S t u d i o - S e t u p   <   F i l e V e r s i o n     3 . 3 . 2 1 8 0 . 8 2 3 6   � 3  I n t e r n a l N a m e   M i c r o s o f t . V i s u a l S t u d i o . S e t u p . I m a g i n g . r e s o u r c e s . d l l     � 2  L e g a l C o p y r i g h t   �   M i c r o s o f t   C o r p o r a t i o n .   A l l e   R e c h t e   v o r b e h a l t e n .   � 3  O r i g i n a l F i l e n a m e   M i c r o s o f t . V i s u a l S t u d i o . S e t u p . I m a g i n g . r e s o u r c e s . d l l     <   P r o d u c t N a m e     V i s u a l   S t u d i o   6 	  P r o d u c t V e r s i o n   3 . 3 . 2 1 8 0                                                                                                                                                                                                                                                                                                                                                                              �     =                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      �%    0�%y	*�H����%j0�%f10	`�He 0\
+�7�N0L0
+�70	 ��� 010	`�He  �[�mR,�Cy�EFM�$�-)@kC�:�BQ��v0��0��3  �db�>��    �0	*�H�� 0~10	UUS10U
Washington10URedmond10U
Microsoft Corporation1(0&UMicrosoft Code Signing PCA 20100220512204706Z230511204706Z0t10	UUS10U
Washington10URedmond10U
Microsoft Corporation10UMicrosoft Corporation0�"0	*�H�� � 0�
� �?�((�nSY]=����t\�O<�����+~�mL�R[Sʃ��y�r����ݼ/i��D��gQNb���oi!V���#\s?�B�u����~�d�q6x*�rٔ.}Z/��gG�h��`T���ɇ���e)���%4�&��/�$�s��HAk��ݿ��iK�RɍϏ�0'ے��~Vl�T~�9*���z���K|+���`��>V�+C0�!i�/+I}j�{��s��j|t?@��?3h��z`hs� ��}0�y0U%0
+�7=+0U�Z��ޠ2�������:Z/0TUM0K�I0G1-0+U$Microsoft Ireland Operations Limited10U230865+4705630U#0���_{�" X�rN��!t#2��0VUO0M0K�I�G�Ehttp://crl.microsoft.com/pki/crl/products/MicCodSigPCA_2010-07-06.crl0Z+N0L0J+0�>http://www.microsoft.com/pki/certs/MicCodSigPCA_2010-07-06.crt0U�0 0	*�H�� � ��~䴦-�W��U�ら*dd:�RW��W��"��UK c���@;�L����
��)�k�#n�ĳ��;��uê=W�a} 9E���}�/�SQwhѣa��F�n?ŵuEA-)�Q�Ղ%��9�h�Kk���'�T�"���-�"ܞ?r�A����R�f�Ã��/f?��	���0��A_��D�	�s������m�R1%E^h�k�{��Dy0��=�0�C�5�H)k�9U�vQ�]����R<0�p0�X�
aRL     0	*�H�� 0��10	UUS10U
Washington10URedmond10U
Microsoft Corporation1200U)Microsoft Root Certificate Authority 20100100706204017Z250706205017Z0~10	UUS10U
Washington10URedmond10U
Microsoft Corporation1(0&UMicrosoft Code Signing PCA 20100�"0	*�H�� � 0�
� �dPyg����	 L����Vh�D���XO��v|mE��9�����e��ҏ�D��e��,U��}�.+�A+��KnILk���q�͵K���̈�k�:��&?���4�W�]I��*.Յ�Y?���+�t�+�;F��FI�fT���UbWr�g�% 4�]���^�(��ղ���cӲ��Ȋ&
Y���5L��R[�����HwօG�����j-\`ƴ*[�#_E�o7�3�j�M�jfcx��0ϕ ���0��0	+�7 0U��_{�" X�rN��!t#2��0	+�7
 S u b C A0U�0U�0�0U#0���Vˏ�\bh�=��[�Κ�0VUO0M0K�I�G�Ehttp://crl.microsoft.com/pki/crl/products/MicRooCerAut_2010-06-23.crl0Z+N0L0J+0�>http://www.microsoft.com/pki/certs/MicRooCerAut_2010-06-23.crt0��U ��0��0��	+�7.0��0=+1http://www.microsoft.com/PKI/docs/CPS/default.htm0@+042  L e g a l _ P o l i c y _ S t a t e m e n t . 0	*�H�� � t�WO){��x�P�"�	�����4�*,����Ͽ���4�ہ�� ��5o��y�w������Na��Z#���bQEg�?<��0��9@���!)奡i�"��t��GC�S��0i��% moa����r ,i�v=Qۦ9H�7am�S˧�a¿⃫�k���}(Q��JQ��lȷJi����~�Ip����rGc��֢���D�c��i��F�z?��!�{�#-�A˿L�ﱜ�"KI�n�v[�Sy������=s5�<�T�RGj���Ҏڙg^2��7���u����ZW�¿����-���'ӵ^i���$gs�MO��V�z��RM�wO�����B	�v�#Vx"&6�ʱ�n���G3b��ɑ3_q@��e�"�B!%�-`�7�A�*�a<�h`R��G���@��w>��SP8��f3'9x�6�N�_��=GS����a=*ג,�7Z>@B1��V��$]Q�jy������{%qD�j����#��u�1�v0�r0��0~10	UUS10U
Washington10URedmond10U
Microsoft Corporation1(0&UMicrosoft Code Signing PCA 20103  �db�>��    �0	`�He ���0	*�H��	1
+�70
+�710
+�70/	*�H��	1" _˽�|��P��B�|z��B��sH~��wN�0B
+�71402�� M i c r o s o f t��http://www.microsoft.com0	*�H�� � �Yu6_��U<�#���sޏɾ.��mk<��������� fE��!����-PG���y���A� �9��}/z�$�J�,��a����+�/5��ֈ��`xü�haB�:��L� �q�p�Z
��\`C ���x���4ݣT�Zk��H�.����=�#���s���<��p�d��7�O�FZ����k�4��$Νz�75哝[j�:1*)�g����0����U��Z0D��u���Ez��� 0��
+�71��0��	*�H�����0��10	`�He 0�Q*�H��	��@�<0�8
+�Y
010	`�He  @�g��NV����Sh����-��#y8�Y�lb�б��20220727182213.808Z0����Ф��0��10	UUS10U
Washington10URedmond10U
Microsoft Corporation1%0#UMicrosoft America Operations1&0$UThales TSS ESN:E5A6-E27C-592E1%0#UMicrosoft Time-Stamp Service��W0�0���3  �����71%   �0	*�H�� 0|10	UUS10U
Washington10URedmond10U
Microsoft Corporation1&0$UMicrosoft Time-Stamp PCA 20100211202190512Z230228190512Z0��10	UUS10U
Washington10URedmond10U
Microsoft Corporation1%0#UMicrosoft America Operations1&0$UThales TSS ESN:E5A6-E27C-592E1%0#UMicrosoft Time-Stamp Service0�"0	*�H�� � 0�
� �mAg�K;?Z��$�!�?P�A����B�v�����bϮݞ�p��ij;<5pX�>����_>�m���Z�./ڧ2��F�A/�$J��zU)����X���f������p�G�d�rX���NLu��5@�6��o4
������9�pǠ�;���d�#r}QD���pS�`�8����������g�J�nX ���/��~�޵o\3�	���u
n�;���&�����X����~�_0�e>����� ���5Ni^�F�s�:}VC�W�s�2����מ\��c�o����#��KT=��!�\·�{mO��<�}0�����[�_���X��e�� �_�1C� ep̼��~����,e�� 6d$}�kh�}˛k����t+�|:��]��"#%�q�ہ�'NGE��~f����G��mK�0b����T~m"R�&ڕЬ+�Яݬ���ph�ٮ�"qJ�Sa�CMިHyz�W�PW"���?�Up:cY�Fo��'�4�Gk�b� ��60�20U���bWW��`�|~o��0U#0���] ^b]����e�S5�r0_UX0V0T�R�P�Nhttp://www.microsoft.com/pkiops/crl/Microsoft%20Time-Stamp%20PCA%202010(1).crl0l+`0^0\+0�Phttp://www.microsoft.com/pkiops/certs/Microsoft%20Time-Stamp%20PCA%202010(1).crt0U�0 0U%0
+0	*�H�� � �6�'�ν�Ћg߲��A� �� ����	D��#��ni�y[g�/�mW�~G�H����V�=n�Xӓ�����"%'�@�+���^'3�d^z��[�9t��J��̥-���A�m,j�p�(����p)(sE��9l⧗��7�<|v�֘���Ĝ�J��s"���ʥ�&e����_���F�d�F�O���Dr@jʼ����M�d#��̈9��5+�!�ؓ[�v��VԈ&��e��7d����¹���A����,=�t��/%�5bh��H�U�n���C��r�K�	H��w��(�0W�iW��F0p���,���kd����vA;��c��}�u;(���o�KS��.r¾q�JI�Z����4>ia�c�(��`�P�� o����1-�)��ʾ�덹��}^����o��O~>`�,KRA��s&�B\uX��^���`�L�ӲV�]pA�ȉ�N�y(��t�v^W�q6�\�0�q0�Y�3   ��k��I�     0	*�H�� 0��10	UUS10U
Washington10URedmond10U
Microsoft Corporation1200U)Microsoft Root Certificate Authority 20100210930182225Z300930183225Z0|10	UUS10U
Washington10URedmond10U
Microsoft Corporation1&0$UMicrosoft Time-Stamp PCA 20100�"0	*�H�� � 0�
� ��L�r!y���$y�Ղ���ҩlNu��5W�lJ�⽹>`3�\O�f��SqZ�~JZ��6g�F#���w2��`}jR�D���Fk��v��P��D�q\Q17�
8n����&S|9azĪ�ri����6�5&dژ;�{3��[~��R���b%�j�]���S���VM�ݼ��㑏�9,Q��pi�6-p�1�5(�㴇$��ɏ~�T���U�mh;�F����z)7���E�Fn�2���0\O,�b�͹⍈䖬J��q�[g`����=� �s}A�Fu��_4����� }~�ٞE߶r/�}_��۪~6�6L�+n�Q���s�M7t�4���G���|?Lۯ^����s=CN�39L��Bh.�QF�ѽjZas�g�^�(v�3rק ���
�co�6d�[���!]_0t���عP��a�65�G�������k�\RQ]�%��Pzl�r��Rą��<�7�?x�E���^ڏ�riƮ{��>j�.� ���0��0	+�7 0#	+�7*�R�dĚ���<F5)��/�0U��] ^b]����e�S5�r0\U U0S0Q+�7L�}0A0?+3http://www.microsoft.com/pkiops/Docs/Repository.htm0U%0
+0	+�7
 S u b C A0U�0U�0�0U#0���Vˏ�\bh�=��[�Κ�0VUO0M0K�I�G�Ehttp://crl.microsoft.com/pki/crl/products/MicRooCerAut_2010-06-23.crl0Z+N0L0J+0�>http://www.microsoft.com/pki/certs/MicRooCerAut_2010-06-23.crt0	*�H�� � �U}�*��,g1$[�rK��o�\�>NGdx���=13�9��q6?�dl|�u9m�1��lѡ�"��fg:SMݘ��x�6.���V ����i�	�{�jo�)�n�?Hu��m��m#T�xSu$W�ݟ�=��h�e��V����(U'�$�@���]='�@�8���)�ü�T�B�������j�BRu�6��as.,k{n?,	x鑲�[�I�t�쑀�=�J>f;O���2ٖ������t��Lro�u0�4�z�P�
X�@<�Tm�ctH,�NG-�q�d�$�smʎ	��WITd�s�